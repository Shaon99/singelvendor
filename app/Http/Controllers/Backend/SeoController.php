<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeoController extends Controller
{
    public function index()
    {
        $seos = Seo::all();
        return view('admin.seo.seo-view',compact('seos'));
    }

    public function create()
    {
        return view('admin.seo.seo-add');
    }

    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name' => 'required|max:100',
        //     'link' => 'required'
        // ]);

        $data = new Seo();
        $data->header = $request->header;
        $data->footer = $request->footer;
        $data->save();
        return redirect('/admin/seo/view')->with('success_msg','Successfully Added');
    }

    public function edit(Seo $seo)
    {
        return view('admin.seo.seo-edit',compact('seo'));
    }

    public function update(Request $request, Seo $seo)
    {
        // $this->validate($request,[
        //     'name' => 'required|max:100',
        //     'link' => 'required'
        // ]);

        $data = $seo;
        $data->header = $request->header;
        $data->footer = $request->footer;
        $data->save();
      return redirect('/admin/seo/view')->with('success_msg','Successfully Updated');
    }

    public function delete(Seo $seo)
    {
        $seo->delete();
         return redirect('/admin/seo/view')->with('success_msg','Successfully Deleted!');
    }
}
