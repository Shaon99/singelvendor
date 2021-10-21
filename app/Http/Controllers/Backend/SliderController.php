<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function view(){
        $data['alldata']=slider::all();
        return view('admin.Slider.slider-view',$data);
    }
    public function add(){
        return view('admin.Slider.slider-add');
    }

    public function store(Request $request){

        $data=new slider();
        $data->short_title=$request->short_title;
        $data->long_title=$request->long_title;
        $data->link = $request->link;
        if($request->file('back_image')){
            $file=$request->file('back_image');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Slider_images'),$filename);
            $data['back_image']=$filename;
        }
        if ($request->file('pro_image')) {
            $file = $request->file('pro_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/Slider_images'), $filename);
            $data['pro_image'] = $filename;
        }
        $data->save();
        return redirect()->route('slider.view')->with('success_msg', 'Slider Store Successfully.');
    }

    public function edit($id){
        $editdata=slider::find($id);
        return view('admin.Slider.slider-add',compact('editdata'));

    }
    public function update(Request $request, $id){
        $data=slider::find($id);
        $data->short_title=$request->short_title;
        $data->long_title=$request->long_title;
        $data->link = $request->link;
        if($request->file('back_image')){
            $file=$request->file('back_image');
            @unlink(public_path('upload/Slider_images/'.$data->back_image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Slider_images/'),$filename);
            $data['back_image']=$filename;
        }
        if ($request->file('pro_image')) {
            $file = $request->file('pro_image');
            @unlink(public_path('upload/Slider_images/' . $data->pro_image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/Slider_images/'), $filename);
            $data['pro_image'] = $filename;
        }
        $data->save();
        return redirect()->route('slider.view')->with('success_msg', 'Slider Updated Successfully.');
    }

    public function delete($id){
        $data=slider::find($id);
        if($data!=NULL){
            @unlink(public_path('upload/Slider_images/' . $data->back_image));
            @unlink(public_path('upload/Slider_images/' . $data->pro_image));
        }
        $data->delete();
        return redirect()->route('slider.view')->with('success_msg', 'Slider Deleted Successfully.');
    }
}