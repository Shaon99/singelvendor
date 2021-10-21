<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\QueryMail;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver;
use Vonage\Message\Shortcode\Alert;

class sendQueryMailController extends Controller
{
    public function sendMail(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'subject' => 'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'subject' => $request->subject,
            'message'   =>   $request->message,
            'email' => $request->email
        );
        Mail::to('sagar.cb.009@gmail.com')->send(new QueryMail($data));
        return redirect()->route('frontsite')->with('success','Your mail has been sent. Thanks for contacting us!');
    }
}
