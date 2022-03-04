<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTestController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
        $email = $request->input('email');
        $title = $request->input('title');
        $content = $request->input('content');
        $files = $request->file('files');

        $details = [
            'title' => $title,
            'content' => $content,
            'email' => $email
        ];

        Mail::send('emails.TestMail', $details, function($message)use($details, $files) {
           $message->to($details['email'], $details['email'])->subject($details['title']);
           if($files){
               foreach ($files as $file){
                   $message->attach($file);
               }
           }
        });

        return response()->json(['result' => 'true', 'result_message' => 'success', 'message' => '이메일 전송 완료']);
    }
}
