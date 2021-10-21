<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\VideoArea;
use Illuminate\Http\Request;

class VideoAreaController extends Controller
{
    public function view() {
        $video = VideoArea::first();

        return view('admin.video-area.video-area-view', [
            'video' => $video
        ]);
    }

    public function edit($id) {
        $video = VideoArea::first();

        return view('admin.video-area.video-area-edit', [
            'video' => $video
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'sub_heading' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'video_link' => 'required|string',
            'video_bg_image' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $video = VideoArea::findOrfail($id);

        $video->update([
            'sub_heading' => $request->sub_heading,
            'heading' => $request->heading,
            'video_link' => $request->video_link
        ]);

        
        if($request->hasFile('video_bg_image')) {
            $file = $request->file('video_bg_image');
            $filename = now()->timestamp.$file->getClientOriginalName();
            $file->move(public_path('upload/video_bg'), $filename);
            
            $video->update([
                'video_bg_image' => $filename
            ]);
        }  

        return redirect()->route('video-area.view')->with('success_msg', 'Advertises Updated Successfully.');
    }
}
