<?php

namespace App\Http\Controllers\Backend\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Illuminate\Support\Str;


class RoleController extends Controller
{
    public function __construct(Role $role)
    {
        $this->pageTitle = "Role Management";
        $this->model = $role;
        $this->permissionModel = new Permission;
        $this->redirectUrl = "admin/role";
        $this->middleware('permission:view-users, guard:employee')->only(['index']);
        $this->middleware('permission:edit-users, guard:employee')->only(['edit', 'update']);
        $this->middleware('permission:create-users, guard:employee')->only(['create', 'store']);
        $this->middleware('permission:delete-users, guard:employee')->only(['delete']);
    }

    public function index()
    {
        $pageTitle = $this->pageTitle;
        //hide superadmin role for everone except superadmins
        if (!$this->isAuthUserSuperAdmin()) {
            $data = $this->model->where('name', '<>', 'superadmin')->get();
        } else {
            $data = $this->model->getAllData();
        }

        return view('backend.role.index', compact('data', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = $this->pageTitle;
        $permissions = $this->permissionModel->getAllData();
        return view('backend.role.create', compact('pageTitle', 'permissions'));
    }

    public function store(CreateRoleRequest $request)
    {
        try {
            $data = $request->all();
            $data['name'] = Str::slug($data['display_name']);
            $role = $this->model->create($data);
            //attach permissions to role
            if (!empty($request->permission_id) && count($request->permission_id) > 0) $role->permissions()->attach($request->permission_id);

            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Added']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()])->withInput();
        }
    }


    public function edit(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        //unauthorize editing of superadmin role by everyone except superadmins
        if ($this->isRoleToBeEditedSuperAdmin($data) and !$this->isAuthUserSuperAdmin()) abort(401);

        $pageTitle = $this->pageTitle;
        $permissions = $this->permissionModel->getAllData();
        $permissionIds =  $data->permissions()->pluck('id')->toArray();
        return view('backend.role.edit', compact('pageTitle', 'data', 'permissions', 'permissionIds'));
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        try {
            $role = $this->model->find($id);
            if (empty($role)) throw new \Exception('Data could not be found');
            //create role
            $data = $request->all();
            $data['name'] = Str::slug($data['display_name']);
            $role->update($data);
            //sync permissions to role
            if (!empty($request->permission_id) && count($request->permission_id) > 0) $role->permissions()->sync($request->permission_id);

            return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data))  throw new \Exception('Data was not found');

            $data->delete();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function isRoleToBeEditedSuperAdmin($role)
    {
        return $role->name === "superadmin";
    }

    public function isAuthUserSuperAdmin()
    {
        return \Auth::guard('employee')->user()->hasRole('superadmin');
    }
}
