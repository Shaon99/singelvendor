<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutUsController extends Controller
{

    public function index() {
        $about = AboutUs::first();

        return view('admin.about_us.about-us-view', compact('about'));
    }

    public function create() {
        return view('admin.about_us.about-us-add');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $data = new AboutUs();
        $data->content = $request->content;
        $data->save();

        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $filename = now()->timestamp . $file->getClientOriginalName();
            $file->move(public_path('upload/about_image/'), $filename);

            $data->update([
                'about_image' => $filename
            ]);
        }

        return redirect()->route('about.us.view')->with('success_msg', 'Successfully Added');
    }

    public function edit(AboutUs $about) {
        return view('admin.about_us.about-us-edit', compact('about'));
    }

    public function update(Request $request, AboutUs $about) {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $data = $about;
        $data->content = $request->content;
        $data->save();

        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $filename = now()->timestamp . $file->getClientOriginalName();
            $file->move(public_path('upload/about_image'), $filename);

            $about->update([
                'about_image' => $filename
            ]);
        }

        return redirect()->route('about.us.view')->with('success_msg', 'Successfully Updated');
    }

    public function delete(AboutUs $about) {
        $about->delete();

        return redirect()->route('about.us.view')->with('success_msg', 'Successfully Deleted!');
    }
}
