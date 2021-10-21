<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\ServiceArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $service = ServiceArea::first();
        return view('admin.service.service-view',compact('service'));
    }

    public function create()
    {
        return view('admin.service.service-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title1' => 'max:50',
            'title2' => 'max:50',
            'title3' => 'max:50',
            'title4' => 'max:50',
            'text1' => 'max:50',
            'text2' => 'max:50',
            'text3' => 'max:50',
            'text4' => 'max:50',
        ]);

        $data = new ServiceArea();
        $data->title1 = $request->title1;
        $data->title2 = $request->title2;
        $data->title3 = $request->title3;
        $data->title4 = $request->title4;
        $data->text1 = $request->text1;
        $data->text2 = $request->text2;
        $data->text3 = $request->text3;
        $data->text4 = $request->text4;
        $data->save();
        return redirect()->route('service.view')->with('success_msg','Successfully Added');
    }

    public function edit(ServiceArea $service)
    {
        return view('admin.service.service-edit',compact('service'));
    }

    public function update(Request $request, ServiceArea $service)
    {
        $this->validate($request,[
            'title1' => 'max:50',
            'title2' => 'max:50',
            'title3' => 'max:50',
            'title4' => 'max:50',
            'text1' => 'max:50',
            'text2' => 'max:50',
            'text3' => 'max:50',
            'text4' => 'max:50',
        ]);

        $data = $service;
        $data->title1 = $request->title1;
        $data->title2 = $request->title2;
        $data->title3 = $request->title3;
        $data->title4 = $request->title4;
        $data->text1 = $request->text1;
        $data->text2 = $request->text2;
        $data->text3 = $request->text3;
        $data->text4 = $request->text4;
        $data->save();
        return redirect()->route('service.view')->with('success_msg','Successfully Updated');
    }

    public function delete(ServiceArea $service)
    {
        $service->delete();
        return redirect()->route('service.view')->with('success_msg','Successfully Deleted!');
    }
}
