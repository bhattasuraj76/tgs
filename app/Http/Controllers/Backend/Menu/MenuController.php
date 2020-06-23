<?php

namespace App\Http\Controllers\Backend\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Http\Requests\Menu\CreateMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;

class MenuController extends Controller
{
    public function __construct(Menu $menu)
    {
        $this->pageTitle = "Menu Management";
        $this->model = $menu;
        $this->menuitemModel = new MenuItem();
        $this->redirectUrl = "admin/menu";
        $this->middleware('permission:view-menus, guard:employee')->only(['index']);
        $this->middleware('permission:edit-menus, guard:employee')->only(['edit', 'update']);
        $this->middleware('permission:create-menus, guard:employee')->only(['create', 'store']);
        $this->middleware('permission:delete-menus, guard:employee')->only(['delete']);
    }

    public function index()
    {
        $pageTitle = $this->pageTitle;
        $data = $this->model->get();
        return view('backend.menu.index', compact('pageTitle', 'data'));
    }

    public function create()
    {
        $pageTitle = $this->pageTitle;
        $menus = $this->model->get();
        return view('backend.menu.create', compact('pageTitle', 'menus'));
    }

    public function store(CreateMenuRequest $request)
    {
        try {
            $attributes = $request->all();
            $this->model->create($attributes);
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Added']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()])->withInput();
        }
    }

    public function edit(Request $request, $id)
    {
        $data['pageTitle'] = $this->pageTitle;
        $data['menuData'] = $this->model->find($id);
        $data['menus'] = $this->menuitemModel->getall($id);
        return view('backend.menu.edit', $data);
    }

    public function manageMenuItems(Request $request, $id)
    {
        $data['pageTitle'] = $this->pageTitle;
        $data['menuData'] = $this->model->find($id);
        $data['menus'] = $this->menuitemModel->getall($id);
        return view('backend.menu.managemenuitems', $data);
    }

    public function show(Request $request)
    {
        $menuitemData = $this->menuitemModel->get();
        if (empty($menuitemData)) abort(404);

        $pageTitle = $this->pageTitle;
        return view('backend.menu.edit_menuitem', compact('pageTitle', 'menuitemData'));
    }

    public function update(UpdateMenuRequest $request, $id)
    {
        try {
            $menu = $this->model->find($id);
            if (empty($menu))  throw new \Exception('Record could not be found');

            $data = $request->all();
            $menu->update($data);
            return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $data = $this->model->find($id);
            if (empty($data)) throw new \Exception('Data was not found');

            $data->delete();
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Deleted']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => $e->getMessage()]);
        }
    }

    public function changeStatus(Request $request, $id)
    {
        try {
            $menu = $this->model->find($id);
            if (empty($menu))  throw new \Exception('Data was not found');

            $menu->status = ($menu->status == 'published') ? 'draft' : 'published';
            $menu->save();
            return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    //add menu item to menu
    public function addcustommenu()
    {
        $menuitem = new MenuItem();
        $menuitem->label = request()->input("label");
        $menuitem->link = request()->input("link");
        $menuitem->menu = request()->input("menuid");
        $menuitem->sort = MenuItem::getNextSortRoot(request()->input("idmenu"));
        $menuitem->save();
    }

    //delete menu item 
    public function deleteitemmenu()
    {
        $menuitem = MenuItem::find(request()->input("id"));
        $menuitem->delete();
    }

    //delte menu (ensure it has no menu items)
    public function deletemenug()
    {
        $menus = new MenuItem();
        $getall = $menus->getall(request()->input("id"));
        if (count($getall) == 0) {
            $menudelete = Menu::find(request()->input("id"));
            $menudelete->delete();
            return json_encode(array("resp" => "you delete this item"));
        } else {
            return json_encode(array("resp" => "You have to delete all items first", "error" => 1));
        }
    }

    //update menu items if input data is array else only item
    public function updateitem()
    {
        $arraydata = request()->input("arraydata");
        if (is_array($arraydata)) {
            foreach ($arraydata as $value) {
                $menuitem = MenuItem::find($value['id']);
                $menuitem->label = $value['label'];
                $menuitem->link = $value['link'];
                $menuitem->save();
            }
        } else {
            $menuitem = MenuItem::find(request()->input("id"));
            $menuitem->label = request()->input("label");
            $menuitem->link = request()->input("url");
            $menuitem->save();
        }
    }

    //update menu items (sort, depth, parent) 
    public function generatemenucontrol()
    {
        //update menuitem
        if (is_array(request()->input("arraydata"))) {
            foreach (request()->input("arraydata") as $value) {
                $menuitem = MenuItem::find($value["id"]);
                $menuitem->parent = $value["parent"];
                $menuitem->sort = $value["sort"];
                $menuitem->depth = $value["depth"];
                $menuitem->save();
            }
        }
        echo json_encode(array("resp" => 1));
    }

}
