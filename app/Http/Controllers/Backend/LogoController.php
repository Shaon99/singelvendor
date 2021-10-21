<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\logo;
use Illuminate\Support\Facades\Auth;

class LogoController extends Controller
{
    // logo
    public function logo()
    {
        $view_logos = logo::all();
    	return view('admin.logo.logo', compact('view_logos'));
    }

    // insertLogo
    public function insertLogo()
    {
        return view('admin.logo.insertLogo');
    }

    // insertlog
    public function insertlog(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $data = new logo();
        $data->created_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/Logo_images'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('logo.view')->with('success_msg', 'Successfully Added');

    }

    // editLogo
    public function editLogo($id)
    {
        $edits = logo::findOrFail($id);
    	return view('admin.logo.editLogo', compact('edits'));
    }

    // updateLogo
    function updateLogo(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $id=$request->id;
        $data = logo::find($id);
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/Logo_images/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/Logo_images'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('logo.view')->with('success_msg', 'Successfully Updated.');

    }

    // deleteLogo
    public function deleteLogo($id)
    {
        $data = logo::find($id);
        if($data!=NULL){
            unlink("upload/Logo_images/$data->image");
        }
        $data->delete();
        return redirect()->route('logo.view')->with('success_msg', 'Successfully Deleted!');

    }
}
