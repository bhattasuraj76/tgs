<?php

namespace App\Http\Controllers\Backend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct(Employee $user)
    {
        $this->pageTitle = "Profile Management";
        $this->model = $user;
        $this->redirectUrl = "admin/password";
    }

    public function changePassword(Request $request)
    {
        if ($request->isMethod('get')) {
            $pageTitle = 'Profile Management';
            return view('backend.profile.change-password', compact('pageTitle'));
        } else {

            \Validator::make($request->all(), [
                'password' => 'required|confirmed',
            ])->validate();

            try {
                $user = $this->model->where('id', auth()->guard('employee')->user()->id)->first();
                if (!Hash::check($request->old_password, $user->password)) {
                    throw new \Exception('Old password did not match');
                }

                $data['password'] = $this->model->hashPassword($request->password);
                $user->update($data);
                return redirect()->back()->withErrors(['alert-success' => 'Successfully chaged password']);
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()])->withInput();
            }
        }
    }
}
