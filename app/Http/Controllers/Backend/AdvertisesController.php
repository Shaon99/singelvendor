<?php

namespace App\Http\Controllers\Backend;

use App\Advertise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisesController extends Controller
{
    public function view() {
        $advertise = Advertise::first();

        return view('admin.advertise.advertise-view', [
            'advertise' => $advertise
        ]);
    }

    public function edit() {
        $advertise = Advertise::first();

        return view('admin.advertise.advertise-edit', [
            'advertise' => $advertise
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'sub_heading_1' => 'required|string|max:255',
            'heading_1' => 'required|string|max:255',
            'button_text_1' => 'required|string|max:255',
            'button_link_1' => 'required|string|max:255',
            'ad_image_1' => 'nullable|image|mimes:jpg,jpeg,png',
            'sub_heading_2' => 'required|string|max:255',
            'heading_2' => 'required|string|max:255',
            'button_text_2' => 'required|string|max:255',
            'button_link_2' => 'required|string|max:255',
            'ad_image_2' => 'nullable|image|mimes:jpg,jpeg,png',
            'sub_heading_3' => 'required|string|max:255',
            'heading_3' => 'required|string|max:255',
            'button_text_3' => 'required|string|max:255',
            'button_link_3' => 'required|string|max:255',
            'ad_image_3' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $advertise = Advertise::findOrFail($id);

        $advertise->update([
            'sub_heading_1' => $request->sub_heading_1,
            'heading_1' => $request->heading_1,
            'button_text_1' => $request->button_text_1,
            'button_link_1' => $request->button_link_1,
            'sub_heading_2' => $request->sub_heading_2,
            'heading_2' => $request->heading_2,
            'button_text_2' => $request->button_text_2,
            'button_link_2' => $request->button_link_1,
            'sub_heading_3' => $request->sub_heading_3,
            'heading_3' => $request->heading_3,
            'button_text_3' => $request->button_text_3,
            'button_link_3' => $request->button_link_3,
        ]);

        if($request->hasFile('ad_image_1')) {
            $file = $request->file('ad_image_1');
            $filename = now()->timestamp.$file->getClientOriginalName();
            
            $file->move(public_path('upload/advertise_images'), $filename);
            
            $advertise->update([
                'ad_image_1' => $filename
            ]);
        }

        
        if($request->hasFile('ad_image_2')) {
            $file = $request->file('ad_image_2');
            $filename = now()->timestamp.$file->getClientOriginalName();
            $file->move(public_path('upload/advertise_images'), $filename);
            
            $advertise->update([
                'ad_image_2' => $filename
            ]);
        }

        if($request->hasFile('ad_image_3')) {
            $file = $request->file('ad_image_3');
            $filename = now()->timestamp.$file->getClientOriginalName();
            $file->move(public_path('upload/advertise_images'), $filename);
            
            $advertise->update([
                'ad_image_3' => $filename
            ]);
        }   

        return redirect()->route('advertise.view')->with('success_msg', 'Advertises Updated Successfully.');
    }
}
