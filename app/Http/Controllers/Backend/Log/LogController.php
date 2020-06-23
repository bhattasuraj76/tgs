<?php

namespace App\Http\Controllers\Backend\Log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;

class LogController extends Controller
{
    public function __construct(Log $log)
    {
        $this->pageTitle = "Log Management";
        $this->model = $log;
        $this->redirectUrl = "admin/log";
        $this->middleware('permission:view-logs, guard:employee')->only(['index']);
        $this->middleware('permission:edit-logs, guard:employee')->only(['edit', 'update']);
        $this->middleware('permission:create-logs, guard:employee')->only(['create', 'store']);
        $this->middleware('permission:delete-logs, guard:employee')->only(['delete']);
    }

    public function index()
    {
        $pageTitle = $this->pageTitle;
        $data = $this->model->getAllData();
        return view('backend.log.index', compact('data', 'pageTitle'));
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
}
