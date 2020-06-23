<?php

namespace App\Http\Controllers\Backend\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\Page\CreatePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
    public function __construct(Page $page)
    {
        $this->pageTitle = "Page Management";
        $this->model = $page;
        $this->redirectUrl = "admin/page";
        $this->middleware('permission:view-pages, guard:employee')->only(['index']);
        $this->middleware('permission:edit-pages, guard:employee')->only(['edit', 'update']);
        $this->middleware('permission:create-pages, guard:employee')->only(['create', 'store']);
        $this->middleware('permission:delete-pages, guard:employee')->only(['delete']);
    }

    public function index()
    {
        $pageTitle = $this->pageTitle;
        $data = $this->model->getAllData(Input::all());
        return view('backend.page.index', compact('pageTitle', 'data'));
    }

    public function create()
    {
        $pageTitle = $this->pageTitle;
        return view('backend.page.create', compact('pageTitle'));
    }

    public function store(CreatePageRequest $request)
    {
        try {
            $data = $request->all();
            $data['title'] = ucfirst($request->title);
            $data['description'] = ucfirst($request->description);
            $data['short_description'] = ucfirst($request->short_description);

            //upload image if any
            // if (!empty($request->file('image'))) {
            //     $image = $request->file('image');
            //     $pathBig = public_path() . '/uploads/page';
            //     if (is_dir($pathBig) != true) {
            //         \File::makeDirectory($pathBig, $mode = 0755, true);
            //     }
            //     $pathSmall = public_path() . '/uploads/page/thumbs-small';
            //     if (is_dir($pathSmall) != true) {
            //         \File::makeDirectory($pathSmall, $mode = 0755, true);
            //     }
            //     $pathMedium = public_path() . '/uploads/page/thumbs-medium';
            //     if (is_dir($pathMedium) != true) {
            //         \File::makeDirectory($pathMedium, $mode = 0755, true);
            //     }
            //     $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            //     $imgBig = \Image::make($image)->fit(750, 460)->save($pathBig . '/' . $filename);
            //     $imgMedium = \Image::make($image)->fit(360, 255)->save($pathMedium . '/' . $filename);
            //     $imgSmall = \Image::make($image)->fit(64, 64)->save($pathSmall . '/' . $filename);
            //     $data['image'] = $filename;
            // }


            $this->model->create($data);
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Added']);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => $e->getMessage()])->withInput();
        }
    }

    public function edit(Request $request, $id)
    {
        $pageData = $this->model->find($id);
        if (empty($pageData)) {
            abort(404);
        }

        $pageTitle = $this->pageTitle;
        return view('backend.page.edit', compact('pageTitle', 'pageData'));
    }

    public function update(UpdatePageRequest $request, $id)
    {
        try {
            $page = $this->model->find($id);
            if (empty($page)) {
                throw new \Exception('Record could not be found');
            }

            $data = $request->all();
            $data['title'] = ucfirst($request->title);
            $data['description'] = ucfirst($request->description);
            $data['short_description'] = ucfirst($request->short_description);

            //upload image if any
            // if (!empty($request->file('image'))) {
            //     $image = $request->file('image');
            //     $pathBig = public_path() . '/uploads/page';
            //     if (is_dir($pathBig) != true) {
            //         \File::makeDirectory($pathBig, $mode = 0755, true);
            //     }
            //     $pathSmall = public_path() . '/uploads/page/thumbs-small';
            //     if (is_dir($pathSmall) != true) {
            //         \File::makeDirectory($pathSmall, $mode = 0755, true);
            //     }
            //     $pathMedium = public_path() . '/uploads/page/thumbs-medium';
            //     if (is_dir($pathMedium) != true) {
            //         \File::makeDirectory($pathMedium, $mode = 0755, true);
            //     }
            //     $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            //     $imgBig = \Image::make($image)->fit(750, 460)->save($pathBig . '/' . $filename);
            //     $imgMedium = \Image::make($image)->fit(360, 255)->save($pathMedium . '/' . $filename);
            //     $imgSmall = \Image::make($image)->fit(64, 64)->save($pathSmall . '/' . $filename);
            //     $data['image'] = $filename;
            // }

            $page->update($data);
            return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $data = $this->model->find($id);

            if (empty($data)) {
                throw new \Exception('Data was not found');
            }

            $data->delete();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function changeStatus(Request $request, $id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data)) {
                return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not found!']);
            }

            $data->status = ($data->status == 'published') ? 'draft' : 'published';
            $data->save();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function deleteSingleImage(Request $request, $id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data)) {
                throw new \Exception('Data was not found');
            }

            $data->image = null;
            $data->save();
            return response()->json(['resp' => 1, 'message' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return response()->json(['resp' => 0, 'message' =>  $e->getMessage()]);
        }
    }
}
