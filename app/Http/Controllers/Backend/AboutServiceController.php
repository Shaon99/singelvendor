<?php

namespace App\Http\Controllers\Backend;

use App\AboutService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutServiceController extends Controller
{
    public function index() {
        $about_service = AboutService::first();

        return view('admin.about-service.index', [
            'service' => $about_service
        ]);
    }

    public function edit() {
        $about_service = AboutService::first();

        return view('admin.about-service.edit', [
            'service' => $about_service
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title1' => 'required|string',
            'text1' => 'required|string',
            'title2' => 'required|string',
            'text2' => 'required|string',
            'title3' => 'required|string',
            'text3' => 'required|string',
        ]);

        $about_service = AboutService::find($id);

        $about_service->update([
            'title1' => $request->title1,
            'text1' => $request->text1,
            'title2' => $request->title2,
            'text2' => $request->text2,
            'title3' => $request->title3,
            'text3' => $request->text3
        ]);

        return redirect()->route('about-service.index')->with('success_msg', 'About Services Updated!');
    }
}
