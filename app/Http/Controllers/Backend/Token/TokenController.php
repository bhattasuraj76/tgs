<?php

namespace App\Http\Controllers\Backend\Token;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Token;
use DataTables;

class TokenController extends Controller
{
    public function __construct(Token $token)
    {
        $this->pageTitle = "Token Management";
        $this->model = $token;
        $this->departmentModel = new Department();
        $this->redirectUrl = "admin/token";
        $this->middleware('permission:view-tokens, guard:employee')->only(['index']);
        $this->middleware('permission:delete-tokens, guard:employee')->only(['delete']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of($this->model->latest()->get())
                ->addColumn('department_name', function ($data) {
                    return $data->getDepartmentNameAttribute();
                })
                ->addColumn('name', function ($data) {
                    return $data->getNameAttribute();
                })
                ->addColumn('action', function ($data) {
                    $showUrl =  route('admin.token.show', ['token' => $data->id]);
                    $destoryUrl =  route('admin.token.destroy', ['token' => $data->id]);

                    $button = '<a href="' . $showUrl . '" class="btn btn-sm btn-info">
                                <i class="fa fa-eye btn-info"></i>
                            </a>
                                <a href="' . $destoryUrl . '" class="btn btn-sm btn-danger js-destroy-item">
                                <i class="fa fa-trash btn-danger"></i>
                            </a>';
                           
                    return $button;
                })->addColumn('status', function ($data) {
                $statusChangeUrl =  route('admin.token.status.change', ['token' => $data->id]);

                    if ($data->status == "valid")
                        $button = '<a class="btn btn-sm  btn-success text-white" href="'.$statusChangeUrl.'">Valid</a>';
                    else
                        $button =  '<a class="btn btn-sm btn-danger text-white" href="'.$statusChangeUrl.'">Invalid</a>';
                    return $button;
                })->rawColumns(['status', 'action'])->make(true);
        }
        $pageTitle = $this->pageTitle;
        $departments = $this->departmentModel->pluck('name', 'id')->toArray();
        return view('backend.token.index', compact('pageTitle', 'departments'));
    }


    public function show(Request $request, $id)
    {
        $data = $this->model->findorFail($id);
        $pageTitle = $this->pageTitle;
        return view('backend.token.show', compact('pageTitle', 'data'));
    }

    public function destroy($id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data)) throw new \Exception('Record not found');

            $data->delete();
            return response()->json(['resp' => 1, 'message' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return response()->json(['resp' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function changeStatus($id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data)) throw new \Exception('Record not found');

            $data->status = ($data->status == 'valid') ? 'invalid' : 'valid';
            $data->save();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }
}
