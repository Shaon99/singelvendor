<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except('store');
    }

    public function view() {
        $newsletter = Newsletter::all();
        return view('admin.newsletter.newsletter-view', compact('newsletter'));
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email|max:255'
        ]);

        Newsletter::create([
            'email' => $request->email
        ]);

        return redirect()->back()->with('subscribed', 'Successfully subscribed!');
    }

    public function destroy($id) {
        Newsletter::findOrFail($id)->delete();

        return redirect()->back()->with('success_msg', 'Successfully Deleted!');
    }
}
