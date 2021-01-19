<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUS;
use Mail;
class InicioController extends Controller
{
   /** * Show the application dashboard. * * @return \Illuminate\Http\Response */
   public function SendMail(Request $request) 
   {
        $name = 'Jos';
        $email = 'iamjosear@outlook.com';
        $subject = 'test';
        $content = 'Hello';

        $toEmail = "iamjosear@outlook.com";
        $mailHeaders = "From: " . $name . "<". $email .">\r\n";
        if(mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "Your contact information is received successfully.";
            $type = "success";
        }
   }
}