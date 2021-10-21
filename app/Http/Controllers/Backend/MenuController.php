<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.menu-view',compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.menu-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'link' => 'required'
        ]);

        $data = new Menu();
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();
        return redirect()->route('menu.view')->with('success_msg','Successfully Added');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.menu-edit',compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'link' => 'required'
        ]);

        $data = $menu;
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();
        return redirect()->route('menu.view')->with('success_msg','Successfully Updated');
    }

    public function delete(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.view')->with('success_msg','Successfully Deleted!');
    }
}
