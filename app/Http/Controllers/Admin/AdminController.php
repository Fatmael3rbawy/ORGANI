<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function showProfile()
    {
        return view('Admin.profile');
    }

    public function editProfile($id)
    {
        $admin = User::find($id);
       return view('Admin.editProfile',compact('admin'));
    }

    public function updateProfile(Request $request, $id)
    {
       $request->validate([
            'name'=>'string|min:3',
            'email'=>'email',
            'phone'=>'string'
        ]);

        $admin=User::find($id);
        $image_name = $admin->image;
        if ($request->hasFile('img')) {
            if ($image_name !== null) {
               unlink(public_path('images/users/') .$image_name);
            }
            $image = $request->file('img');
            $ext = $image->getClientOriginalExtension();
            $image_name = 'admin' . uniqid() . ".$ext";
            $image->move(public_path('images/users'),$image_name);
        }

        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'image'=>$image_name
        ]);

        return redirect(route('admin.profile'))->with('sms','Your Profile has updated');
    }

    public function destroy($id)
    {
        $admin=User::find($id);
        $admin->delete();
        return redirect(route('home.index'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('auth.login'));
    }
}
