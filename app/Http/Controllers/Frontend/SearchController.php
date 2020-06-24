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

class SearchController extends Controller
{
    public function __construct()
    {
        $this->departmentModel = new Department();
        $this->holidayModel = new Holiday();
        $this->tokenModel = new Token();
    }

    public function index()
    {
        $pageTitle = config('website_default.site_name') . ' | Search Tokens';
        return view('frontend.search.search', compact('pageTitle'));
    }

    public function search(Request $request)
    {
        //validate input
        $validator = $this->validateSearch($request->all());
        if ($validator->fails()) {
            return response()->json(['resp' => 0, 'message' => 'Validation Error', 'errors' => $validator->errors()]);
        }

        try {
            $tokens = $this->tokenModel->where([['email', $request->email], ['last_name', $request->last_name], ['status', 'valid']])->get();
            if ($tokens->isEmpty()) throw new \Exception('Invalid email or last name');

            return response()->json(['resp' => 1,  'message' => view('frontend.search.token', ['tokens' => $tokens])->render()]);
        } catch (\Exception $e) {
            return response()->json(['resp' => 0, 'message' => $e->getMessage()]);
        }
    }


    public function validateSearch($data)
    {
        $rules = [
            'last_name' => 'required',
            'email' => 'required|email',
        ];

        $messages = [
            'last_name.*' => 'Last name is required',
            'email.*' => 'Email is required',
        ];
        return Validator::make($data, $rules, $messages);
    }
}
