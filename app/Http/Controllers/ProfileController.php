<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProfileResource;
class ProfileController extends Controller
{
    public function index() {
        return view('userProfile.profile');
    }

    public function profile() {
        $user = Auth::user();

        return $user;
    }


    public function editProfile(Request $request, $id)
    {
        // $request->validate([
        //     'image' => 'mimes:jpg,png,jpeg',
        // ]);

        if ($request->file('image') ) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/assets/images/profile/'), $imageName);
            \DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $imageName,
            ]);
            return response()->json(['status' => 'Profile Berhasil di Update!']);
        }
        elseif ( empty($request->password) ) {
            \DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return response()->json(['status' => 'Profile Berhasil di Update!']);
        } 
  
        elseif ($request->password ) {

            \DB::table('users')->where('id',$id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
               
            ]);
            return response()->json(['status' => 'Profile Berhasil di Update!']);
        }
    
        
        else {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/assets/images/profile/'), $imageName);
        \DB::table('users')->where('id',$id)->update([

            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
            'password' =>  Hash::make($request->password),
        ]);
        return response()->json(['status' => 'Profile Berhasil di Update!']);
    }
}
}
