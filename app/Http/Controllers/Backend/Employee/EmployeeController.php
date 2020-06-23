<?php

namespace App\Http\Controllers\Backend\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;

class EmployeeController extends Controller
{

    public function __construct(Employee $user)
    {
        $this->pageTitle = "User Management";
        $this->model = $user;
        $this->roleModel = new Role;
        $this->redirectUrl = "admin/user";
        $this->middleware('permission:view-users, guard:employee')->only(['index']);
        $this->middleware('permission:edit-users, guard:employee')->only(['edit', 'update']);
        $this->middleware('permission:create-users, guard:employee')->only(['create', 'store']);
        $this->middleware('permission:delete-users, guard:employee')->only(['delete']);
    }

    public function index()
    {
        $pageTitle = $this->pageTitle;
        //hide superadmin users for everone except superadmins
        if (!$this->isAuthUserSuperAdmin()) {
            $data = $this->model->whereHas('roles', function (Builder $query) {
                $query->where('name', '<>', 'superadmin');
            })->get();
        } else {
            $data = $this->model->getAllData();
        }

        return view('backend.employee.index', compact('pageTitle', 'data'));
    }

    public function create()
    {
        $pageTitle = $this->pageTitle;
        //hide superadmin role for everone except superadmins
        if (!$this->isAuthUserSuperAdmin()) {
            $roles = $this->roleModel->where('name', '<>', 'superadmin')->get();
        } else {
            $roles = $this->roleModel->getAllData();
        }
        $roles = $roles
            ->pluck('display_name', 'id')
            ->prepend('Select a role', '');

        return view('backend.employee.create', compact('pageTitle', 'roles'));
    }

    public function store(CreateEmployeeRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = $this->model->hashPassword($request->password);
            $user = $this->model->create($data);

            //attach roles to user
            $user->roles()->attach($request->role_id);
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Added']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()])->withInput();
        }
    }

    public function edit(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        //unauthorize editing of superadmin by everyone except superadmins
        if ($this->isUserToBeEditedSuperAdmin($data) and !$this->isAuthUserSuperAdmin()) abort(401);

        $pageTitle = $this->pageTitle;
        //get roles based on authUser role
        if (!$this->isAuthUserSuperAdmin()) {
            $roles = $this->roleModel->where('name', '<>', 'superadmin')->get();
        } else {
            $roles = $this->roleModel->getAllData();
        }
        $roles = $roles
            ->pluck('display_name', 'id')
            ->prepend('Select a role', '');

        return view('backend.employee.edit', compact('pageTitle', 'data', 'roles'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        try {
            $user = $this->model->find($id);
            if (empty($user)) throw new \Exception('Data could not be found');

            //unauthorize editing of superadmin by everyone except superadmins
            if ($this->isUserToBeEditedSuperAdmin($user) and !$this->isAuthUserSuperAdmin()) abort(401);

            $data = $request->all();
            //hash password if present
            if (!empty($request->password))  $data['password'] = $this->model->hashPassword($request->password);
            else  $data['password'] = $user->password;

            $user->update($data);
            //sync roles to user
            $user->roles()->sync($request->role_id);
            return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()])->withInput();
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data)) throw new \Exception('Data could not be found');

            $data->delete();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function isUserToBeEditedSuperAdmin($user)
    {
        return $user->hasRole('superadmin');
    }

    public function isAuthUserSuperAdmin()
    {
        return \Auth::guard('employee')->user()->hasRole('superadmin');
    }
}
