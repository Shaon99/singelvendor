<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Social;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    public function view() {
        $social = Social::first();

        return view('admin.social-area.social-view', compact('social'));
    }

    public function edit() {
        $social = Social::first();

        return view('admin.social-area.social-edit', [
            'social' => $social
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'youtube_link' => 'nullable|string|max:255',
            'twitter_link' => 'nullable|string|max:255',
            'instragram_link' => 'nullable|string|max:255',
            'pinterest_link' => 'nullable|string|max:255'
        ]);

        $social = Social::findOrFail($id);

        $social->update([
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'facebook_link' => $request->facebook_link,
            'youtube_link' => $request->youtube_link,
            'twitter_link' => $request->twitter_link,
            'instragram_link' => $request->instragram_link,
            'pinterest_link' => $request->pinterest_link
        ]);

        return redirect()->route('social.view')->with('success_msg', 'Social Area Updated Successfully.');
    }
}
