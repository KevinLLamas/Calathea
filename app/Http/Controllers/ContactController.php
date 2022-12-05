<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function contactSubmit(Request $request)
    {
        Mail::send('emails.contactmail',[
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->msg,
        ], function($mail) use($request){
            
            $mail->from(env('MAIL_FROM_ADDRESS'), $request->name);
            $mail->to($request->email)->subject($request->subject);
        });

        return \response()->json([
            'ok'=> true,
        ]);
    }
}
