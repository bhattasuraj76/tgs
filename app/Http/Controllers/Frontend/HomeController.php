<?php

namespace App\Http\Controllers\Frontend;

use App\Events\TokenCreated;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Holiday;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->departmentModel = new Department();
        $this->holidayModel = new Holiday();
        $this->tokenModel = new Token();
    }

    public function index()
    {
        $departments = $this->departmentModel
            ->where('status', 'active')
            ->orderBy('position', 'desc')
            ->get();
        return view('frontend.home', compact('departments'));
    }

    public function createToken(Request $request)
    {
        //validate input
        $validator = $this->validateToken($request->all());
        if ($validator->fails()) {
            return response()->json(['resp' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()]);
        }

        //check if preferred date is holiday
        $department = $this->departmentModel->find($request->department_id);
        $holidays =  $this->holidayModel->pluck('date')->toArray();
        $preferredDate = $request->date;
        if (in_array($preferredDate, $holidays)) {
            return response()->json(['resp' => 0, 'message' => 'Please select another date', 'errors' => ['date' => 'Please select another date']]);
        }

        //check if preferred weekday is not one of working weekdays
        $weekMap = [
            0 => 'sunday',
            1 => 'monday',
            2 => 'tuesday',
            3 => 'wednesday',
            4 => 'thursday',
            5 => 'friday',
            6 => 'saturday',
        ];
        $dayOfTheWeek = Carbon::parse($request->date)->dayOfWeek;
        $preferdWeekday = $weekMap[$dayOfTheWeek];
        $days =  $department->workingdays()->pluck('day')->toArray();
        if (!in_array($preferdWeekday, $days)) {
            return response()->json(['resp' => 0, 'message' => 'Please select another date', 'errors' => ['date' => 'Please select another date']]);
        }

        //check if maximum quotas has reached
        $tokensCount =  $this->tokenModel->whereDate('date', $request->date)->where('status', 'valid')->count();
        $workingDay = $department->workingdays()->where('day', $preferdWeekday)->first();
        if ($tokensCount >= $workingDay->max_quotas) {
            return response()->json(['resp' => 0, 'message' => 'Sorry, max quotas has reached.']);
        }

        //check if preferred time is during break time or not during office hours
        $preferredTime =  $request->time;
        if (
            $this->checkIfPreferredTimeDuringBreakTime($preferredTime, $workingDay, $preferdWeekday)
            ||
            !$this->checkIfPreferredTimeDuringWorkingHours($preferredTime, $workingDay, $preferdWeekday)
        ) {
            return response()->json(['resp' => 0, 'message' => 'Please select another time', 'errors' => ['time' => 'Please select another date']]);
        }


        try {
            $attributes = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'department_id' => $request->department_id,
                'date' => $request->date,
                'time_slot' => $request->time
            ];

            $token = $this->tokenModel->create($attributes);
            //dispatch token created event to send token mail
            event(new TokenCreated($token));
            return response()->json(['resp' => 1,  'message' => 'Token has been send to your email. Please check your mail.']);
        } catch (\Exception $e) {
            return response()->json(['resp' => 0, 'message' => $e->getMessage()]);
        }
        return view('frontend.home', compact('departments'));
    }

    public function checkifPreferredTimeDuringBreakTime($preferredTime, $workingDay, $preferdWeekday)
    {
        $breakStartTime =  $workingDay->break_start_time;
        $breakEndTime =  $workingDay->break_end_time;
        return $preferredTime >= $breakStartTime && $preferredTime <= $breakEndTime;
    }

    public function checkIfPreferredTimeDuringWorkingHours($preferredTime, $workingDay, $preferdWeekday)
    {
        $officeStartTime =  $workingDay->office_start_time;
        $officeEndTime =  $workingDay->office_end_time;
        return $preferredTime >= $officeStartTime && $preferredTime <= $officeEndTime;
    }

    public function validateToken($data)
    {
        $rules = [
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:6',
            'date' => 'required|date|date_format:Y-m-d'
        ];

        $messages = [
            'department_id.*' => 'Please select a department',
            'first_name.*' => 'First name is required',
            'last_name.*' => 'Last name is required',
            'email.*' => 'Email is required',
            'phone.*' => 'Please enter valid phone number',
            'date' => 'Please select date'
        ];
        return Validator::make($data, $rules, $messages);
    }
}
