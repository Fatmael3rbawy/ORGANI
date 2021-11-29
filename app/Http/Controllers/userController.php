<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function HandelLogin(Request $request)
    {
        $request->validate([
            'email' => 'email|exists:users',
            'password' => 'required|min:8',
        ]);

        $remember_me = $request->has('remember_me') ? true : false;
        $check = $request->only('email', 'password');

        if (Auth::attempt($check, $remember_me)) {
            if (Auth::user()->is_admin == 1)
                return redirect(route('admin.index'));
            else
                return redirect(route('home.index'));
        } else
            return back()->with('error', 'Password is not valid');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function Handelregister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:3',
            'phone' => 'string|required',
            'img' =>'image',
            'email' => 'email',
            'password' => 'confirmed|required|min:8',

        ]);

        // $image=$request->file('img');
        // $ext= $image->getClientOriginalExtension();
        // $image_name= 'user' . uniqid() .".$ext" ;
        // $image->move(public_path('images/users'),$image_name);

        $newUser = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            // 'image' =>$image_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($newUser);
        return redirect(route('home.index'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home.index'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.profileUpdate', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|min:3',
            'phone' => 'string',
            'email' => 'email',
        ]);
        $user = User::find($id);
        $image_name= $user->image;
        if ($request->hasFile('img')) {
            if ($image_name!= null) {
               unlink(public_path('images/users/').$image_name);
             }
            $image=$request->file('img');
            $ext= $image->getClientOriginalExtension();
            $image_name= 'user' . uniqid() .".$ext" ;
            $image->move(public_path('images/users'),$image_name);
     
        }
       
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image_name
        ]);
        return redirect(route('auth.profile'))->with('sms','Your Profile has updated');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();
        return redirect(route('home.index'));
    }
}
