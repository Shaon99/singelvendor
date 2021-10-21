<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $policy = PrivacyPolicy::first();
        return view('admin.privacy_policy.privacy-policy-view',compact('policy'));
    }

    public function create()
    {
        return view('admin.privacy_policy.privacy-policy-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);

        $data = new PrivacyPolicy();
        $data->content = $request->content;
        $data->save();
        return redirect()->route('privacy.policy.view')->with('success_msg','Successfully Added');
    }

    public function edit(PrivacyPolicy $policy)
    {
        return view('admin.privacy_policy.privacy-policy-edit',compact('policy'));
    }

    public function update(Request $request, PrivacyPolicy $policy)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);

        $data = $policy;
        $data->content = $request->content;
        $data->save();
        return redirect()->route('privacy.policy.view')->with('success_msg','Successfully Updated');
    }

    public function delete(PrivacyPolicy $policy)
    {
        $policy->delete();
        return redirect()->route('privacy.policy.view')->with('success_msg','Successfully Deleted!');
    }
}
