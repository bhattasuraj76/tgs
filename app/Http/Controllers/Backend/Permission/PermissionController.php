<?php

namespace App\Http\Controllers\Backend\Permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use Illuminate\Support\Str;


class PermissionController extends Controller
{
    public function __construct(Permission $permission)
    {
        $this->pageTitle = "Permission Management";
        $this->model = $permission;
        $this->redirectUrl = "admin/permission";
        $this->middleware('permission:view-users, guard:employee')->only(['index']);
        $this->middleware('permission:edit-users, guard:employee')->only(['edit', 'update']);
        $this->middleware('permission:create-users, guard:employee')->only(['create', 'store']);
        $this->middleware('permission:delete-users, guard:employee')->only(['delete']);
    }

    public function index()
    {
        $pageTitle = $this->pageTitle;
        $data = $this->model->get();
        return view('backend.permission.index', compact('data', 'pageTitle'));
    }

    public function edit(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $pageTitle = $this->pageTitle;
        return view('backend.permission.edit', compact('pageTitle', 'data'));
    }

    public function update(UpdatePermissionRequest $request, $id)
    {
        try {
            $permission = $this->model->find($id);
            if (empty($permission)) throw new \Exception('Data not found');

            $data = $request->all();
            $permission->update($data);
            return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($permission)) throw new \Exception('Data not found');

            $data->delete();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }
}
