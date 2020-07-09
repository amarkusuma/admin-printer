<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Postingan ;
use App\Http\Resources\PostingResource;
use App\Events\PostinganEvent;
use App\Events\CobaEvent;
use App\Events\DeletePostinganEvent;
use DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class PostinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function input()
    {
       return view('postingan.input_postingan');
    }

    public function post_postingan(Request $request){

        $user = Auth::user();
        $postingan = new Postingan ;
        $countComent = 0 ;
        
        $postingan = $user->postingan()->create([
            'content' => $request->postingan,
            
        ]);

        broadcast(new PostinganEvent($user, $postingan , $countComent ));
        return response()->json(['status' => 'Postingan Sent!']);
    }

    public function postingan(){
       return PostingResource::collection(Postingan::get());
    }

    public function getPostingan()
    {
        return Postingan::with('user')->get();
    }

    public function broadcastPostingan(Request $request)
    {
        $user = Auth::user();
        // $postingan = new Postingan ;
        
        $postingan = $user->postingan()->create([
            'content' => $request->postingan,
            
        ]);

        
        broadcast(new CobaEvent($user, $postingan));
        return response()->json(['status' => 'Postingan Sent!']);
    }


    public function user()
    {
        $data = Auth::user();
        return $data;
    }

    public function deletePostingan($id){
        $user = Auth::user();
        $comment = Postingan::find($id)->delete();   
        // $comment;
        broadcast(new DeletePostinganEvent($user , $id));
        return response()->json(['status' => 'post berhasil di hapus!']);
    }
}
