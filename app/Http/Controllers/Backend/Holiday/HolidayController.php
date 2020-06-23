<?php

namespace App\Http\Controllers\Backend\Holiday;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Http\Requests\Holiday\CreateHolidayRequest;
use App\Http\Requests\Holiday\UpdateHolidayRequest;


class HolidayController extends Controller
{
    public function __construct(Holiday $holiday)
    {
        $this->pageTitle = "Holiday Management";
        $this->model = $holiday;
        $this->redirectUrl = "admin/holiday";
        $this->middleware('permission:view-holidays, guard:employee')->only(['index']);
        $this->middleware('permission:edit-holidays, guard:employee')->only(['edit', 'update']);
        $this->middleware('permission:create-holidays, guard:employee')->only(['create', 'store']);
        $this->middleware('permission:delete-holidays, guard:employee')->only(['delete']);
    }

    public function index(Request $request)
    {
        $pageTitle = $this->pageTitle;
        $data = $this->model->getAllData($request->all());
        return view('backend.holiday.index', compact('data', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = $this->pageTitle;
        return view('backend.holiday.create', compact('pageTitle'));
    }

    public function store(CreateHolidayRequest $request)
    {
        try {
            $attributes = $request->all();
            $this->model->create($attributes);
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()])->withInput();
        }
    }

    public function edit(Request $request, $id)
    {
        $data = $this->model->findorFail($id);
        $pageTitle = $this->pageTitle;
        return view('backend.holiday.edit', compact('pageTitle', 'data'));
    }

    public function update(UpdateHolidayRequest $request, $id)
    {
        try {
            $holiday = $this->model->find($id);
            if (empty($holiday)) throw new \Exception('Record not found');

            $attributes = $request->all();
            $holiday->update($attributes);
            return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
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

            $data->status = ($data->status == 'published') ? 'draft' : 'published';
            $data->save();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }
}
