<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::first();
        return view('admin.header.header-view',compact('header'));
    }

    public function store(Request $request)
    {
        // $this->validate($request,[
            
        // ]);

        $data = new Header();
        $data->title = $request->title;
        $data->top_heading = $request->top_heading;
        $data->lang = $request->lang;
        $data->curr = $request->curr;
        $data->bannar_offer = $request->bannar_offer;
        $data->bannar_text = $request->bannar_text;
        $data->save();
        return redirect()->route('header.view')->with('success_msg','Successfully Added');
    }

    public function update(Request $request, Header $header)
    {
        // $this->validate($request,[
        //     'content' => 'required'
        // ]);

        $data = $header;
        $data->top_heading = $request->top_heading;
        $data->title = $request->title;
        $data->lang = $request->lang;
        $data->curr = $request->curr;
        $data->bannar_offer = $request->bannar_offer;
        $data->bannar_text = $request->bannar_text;
        $data->save();
        return redirect()->route('header.view')->with('success_msg','Successfully Updated');
    }

    public function delete(Header $header)
    {
        $header->delete();
        return redirect()->route('header.view')->with('success_msg','Successfully Deleted!');
    }
}
