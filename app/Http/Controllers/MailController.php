<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{

    use Notifiable;
    public $tries = 5;

    public function sendMail(Request $request)
    {

        $data = [
            'username' => $request['username'],
            'message' => $request['message'],
        ];

        Mail::to('admin@admin.com')
            ->queue(new WelcomeMail($data));


        return response('Message send', 200);
    }
}