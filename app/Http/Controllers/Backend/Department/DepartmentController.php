<?php

namespace App\Http\Controllers\Backend\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Setting;
use App\Models\WorkingDay;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function __construct(Department $department)
    {
        $this->pageTitle = "Department Management";
        $this->model = $department;
        $this->workingDayModel = new WorkingDay();
        $this->settingModel = new Setting();
        $this->redirectUrl = "admin/department";
        $this->middleware('permission:view-departments, guard:employee')->only(['index']);
        $this->middleware('permission:edit-departments, guard:employee')->only(['edit', 'update']);
        $this->middleware('permission:create-departments, guard:employee')->only(['create', 'store']);
        $this->middleware('permission:delete-departments, guard:employee')->only(['delete']);
    }

    public function index(Request $request)
    {
        $pageTitle = $this->pageTitle;
        $data = $this->model->getAllData($request->all());
        return view('backend.department.index', compact('data', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = $this->pageTitle;
        $selectDaysHtml = $this->selectDaysHtml();
        return view('backend.department.create', compact('pageTitle', 'selectDaysHtml'));
    }

    public function store(Request $request)
    {
        try {
            $attributes = $request->all();
            $department = $this->model->create($attributes);
            $this->insertWorkingDays($request, $department->id);
            return response()->json(['resp' => 1, 'message' => 'Successfully Created', 'id' => $department->id]);
        } catch (\Exception $e) {
            return response()->json(['resp' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function insertWorkingDays($request, $departmentId)
    {
        $days = $request->has('working_day') && is_array($request->working_day['day']) ? $request->working_day['day'] : [];
        if (count($days) < 0) return;

        $this->handleWorkingDays($days, $request, $departmentId);
    }

    public function edit(Request $request, $id)
    {
        $data = $this->model->findorFail($id);
        $pageTitle = $this->pageTitle;
        $selectDaysHtml = $this->selectDaysHtml();
        return view('backend.department.edit', compact('pageTitle', 'data', 'selectDaysHtml'));
    }

    public function update(Request $request, $id)
    {
        try {
            $department = $this->model->find($id);
            if (empty($department)) throw new \Exception('Record not found');

            $attributes = $request->all();
            $department->update($attributes);
            $this->updateWorkingDays($request, $department->id);
            return response()->json(['resp' => 1, 'message' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return response()->json(['resp' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function updateWorkingDays($request, $departmentId)
    {
        $days = $request->has('working_day') && is_array($request->working_day['day']) ? $request->working_day['day'] : [];
        if (count($days) < 0) return;

        $this->handleWorkingDays($days, $request, $departmentId);
    }

    public function handleWorkingDays($days, $request, $departmentId)
    {
        $settings = $this->settingModel->first();
        foreach ($days as $key => $d) {
            if (empty($request->working_day['day'][$key])) continue;

            $data['department_id'] = $departmentId;
            $data['day'] = $request->working_day['day'][$key];
            $data['office_start_time'] = !empty($request->working_day['office_start_time'][$key]) ? $request->working_day['office_start_time'][$key] : $settings->office_start_time;
            $data['office_end_time'] = !empty($request->working_day['office_end_time'][$key]) ? $request->working_day['office_end_time'][$key] : $settings->office_end_time;
            $data['break_start_time'] = !empty($request->working_day['break_start_time'][$key]) ? $request->working_day['break_start_time'][$key] : $settings->break_start_time;
            $data['break_end_time'] = !empty($request->working_day['break_end_time'][$key]) ? $request->working_day['break_end_time'][$key] : $settings->break_end_time;
            $data['max_quotas'] = !empty($request->working_day['max_quotas'][$key]) ? $request->working_day['max_quotas'][$key] : $settings->max_quotas;
            $data['allocation_time'] = !empty($request->working_day['allocation_time'][$key]) ? $request->working_day['allocation_time'][$key] : $settings->allocation_time;
            $data['position'] = !empty($request->working_day['position'][$key]) ? $request->working_day['position'][$key] : '';

            if (!empty($request->working_day['id'][$key]))
                $this->workingDayModel->find($request->working_day['id'][$key])->update($data);
            else
                $this->workingDayModel->create($data);
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data)) throw new \Exception('Record not found');

            $data->delete();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function changeStatus($id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data)) throw new \Exception('Record not found');

            $data->status = ($data->status == 'active') ? 'inactive' : 'active';
            $data->save();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function selectDaysHtml()
    {
        $days = ['' => 'Select Day', 'sunday' => 'Sunday', 'monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday', 'saturday' => 'Saturday'];
        $html = "";
        foreach ($days as $key => $d) {
            $html .= "<option value='" . $key . "'>" . $d . "</option>";
        }

        return $html;
    }

    public function deleteSingleWorkingDay($packageId, $workingDayId)
    {
        try {
            $data = $this->workingDayModel->find($workingDayId);
            if (empty($data)) throw new \Exception('Data not found');
            $data->delete();
            return response()->json(['resp' => 1, 'message' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return response()->json(['resp' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function ajaxValidateDepartment(Request $request)
    {
        $validate = $this->validateDepartment($request, $request->all());
        if ($validate->fails()) {
            return response()->json(['resp' => 0, 'errors' => $validate->errors()]);
        } else {
            if ($request->id) return $this->update($request, $request->id);
            return $this->store($request);
        }
    }

    public function validateDepartment($request, $data)
    {
        $rules = [
            //Department
            'name' => 'required|min:3|unique:departments,name,' . $request->get('id'),
            //Working Days
            'working_day.day.*' => 'required',
            // 'working_day.office_start_time.*' => 'required',
            // 'working_day.office_end_time.*' => 'required',
            // 'working_day.break_start_time.*' => 'required',
            // 'working_day.break_end_time.*' => 'required',
            // 'working_day.max_quotas.*' => 'required',
        ];

        $messages = [
            'name.required' => 'Department name is required',
            'name.unique' => 'Deparment already exists',
            "working_day.day.*.required" => "Please select a day",
            // "working_day.office_start_time.*.required" => "Please fill office start time",
            // "working_day.office_end_time.*.required" => "Please fill office end time",
            // "working_day.break_start_time.*.required" => "Please fill break start time",
            // "working_day.break_end_time.*.required" => "Please fill break end time",
            // "working_day.max_quotas.*.required" => "Please fill max quotas",
        ];

        return Validator::make($data, $rules, $messages);
    }
}
