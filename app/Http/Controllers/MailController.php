<?php

namespace App\Http\Controllers;

use App\Mail\AmazonMail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
        $email = $request->input('email');

        $details = [
            'title' => '홈페이지에서 보낸 이메일 입니다.',
            'body' => '테스트 이메일입니다.'
        ];
        Mail::to($email)->send(new TestMail($details));
        return response()->json(['result' => 'true', 'result_message' => 'success', 'message' => '이메일 전송 완료']);
    }
}
