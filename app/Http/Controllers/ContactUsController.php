<?php

namespace App\Http\Controllers;
use App\contact_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact_us');
    }
    public function create(Request $request)
    {
        $request->validate([
            'email' =>'email| required |exists:users',
            'name' => 'string|required',
            'message' => 'string|required'
        ]);

        contact_us::create([
            'name' => $request->name,
            'email' =>$request->email,
            'message' =>$request->message,
            'user_id' => Auth::user()->id
            
        ]);
        return back()->with('success','Your message has been sent, We will replay to it within 24 hours');
    }
}
