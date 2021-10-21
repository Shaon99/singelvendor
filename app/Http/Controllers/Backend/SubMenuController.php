<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\SubMenu;
use App\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubMenuController extends Controller
{
    public function index()
    {
        $subs = SubMenu::all();
        return view('admin.sub_menu.sub-menu-view',compact('subs'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.sub_menu.sub-menu-add', compact('menus'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'link' => 'required',
            'menu_id' => 'required'
        ]);

        $data = new SubMenu();
        $data->name = $request->name;
        $data->menu_id = $request->menu_id;
        $data->link = $request->link;
        $data->save();
        return redirect()->route('sub.menu.view')->with('success_msg','Successfully Added');
    }

    public function edit(SubMenu $sub)
    {
        $menus = Menu::all();
        return view('admin.sub_menu.sub-menu-edit',compact('sub', 'menus'));
    }

    public function update(Request $request, SubMenu $sub)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'link' => 'required'
        ]);

        $data = $sub;
        $data->name = $request->name;
        $data->menu_id = $request->menu_id;
        $data->link = $request->link;
        $data->save();
        return redirect()->route('sub.menu.view')->with('success_msg','Successfully Updated');
    }

    public function delete(SubMenu $sub)
    {
        $sub->delete();
        return redirect()->route('sub.menu.view')->with('success_msg','Successfully Deleted!');
    }
}
