<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\TermsAndConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermsNConditionsController extends Controller
{
    public function index()
    {
        $term = TermsAndConditions::first();
        return view('admin.terms_and_conditions.terms-and-conditions-view',compact('term'));
    }

    public function create()
    {
        return view('admin.terms_and_conditions.terms-and-conditions-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);

        $data = new TermsAndConditions();
        $data->content = $request->content;
        $data->save();
        return redirect()->route('terms.and.conditions.view')->with('success_msg','Successfully Added');
    }

    public function edit(TermsAndConditions $term)
    {
        return view('admin.terms_and_conditions.terms-and-conditions-edit',compact('term'));
    }

    public function update(Request $request, TermsAndConditions $term)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);

        $data = $term;
        $data->content = $request->content;
        $data->save();
        return redirect()->route('terms.and.conditions.view')->with('success_msg','Successfully Updated');
    }

    public function delete(TermsAndConditions $term)
    {
        $term->delete();
        return redirect()->route('terms.and.conditions.view')->with('success_msg','Successfully Deleted!');
    }
}
