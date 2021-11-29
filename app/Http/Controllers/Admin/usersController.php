<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use aPP\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(4);
        return view('Admin.Users.index',compact('users')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|min:3',
            'img' => 'image',
            'email' => 'email' ,
            'phone' => 'string |min:11' ,
            'password' => 'confirmed|required|min:8'
        ]);

        $image=$request->file('img');
        $ext=$image->getClientOriginalExtension();
        $image_name= 'user'. uniqid() .".$ext";
        $image->move(public_path('images/users'),$image_name);

        User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'phone' => $request->phone,
            'image' => $image_name,
            'password' => Hash::make( $request->password)
        ]);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.Users.edit' ,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|min:3',
            'email' => 'email' ,
            'phone' => 'string |min:11' 
        ]);

        $user = User::find($id);
        $image_name= $user->image;

        if ($request->hasFile('img')) {
            if ($image_name !== null) {
                unlink(public_path('images/users/') .$image_name);
             }
            $image=$request->file('img');
            $ext= $image->getClientOriginalExtension();
            $image_name= 'user' . uniqid() .".$ext" ;
            $image->move(public_path('images/users'),$image_name);
     
        }
     
        $user ->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image_name

        ]);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
}
