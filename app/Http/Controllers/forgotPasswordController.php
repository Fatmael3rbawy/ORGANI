<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;

class forgotPasswordController extends Controller
{
    public function getMail()
    {
        return view('auth.forgotPassword');
    }
    public function postMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);
        DB::table('password_resets')->insert(
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        Mail::send('auth.verify', ['token' => $token], function ($message) use ($request) {
            
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });
        return back()->with('message', 'We have e-mailed your password reset link, Check your email!');
    }
}
