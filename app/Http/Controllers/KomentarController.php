<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CommentEvent;
use App\Events\SubcommentEvent;
use App\Events\DeletecommentEvent;
use App\Events\DeleteSubcommentEvent;
use DB;
use Auth;
use App\Comment;
use App\Postingan ;
use App\User ; 
use App\Subcomment;
use App\Http\Resources\KomentarResource;
use App\Http\Resources\SubKomentarResource;
use App\Http\Resources\CountComentResource;
use App\Http\Resources\CountSubcomentResource;

class KomentarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post_comment(Request $request){

        $user = Auth::user();
        $comment = new Comment ;
        $count = 0;
        
        $commentar = $comment->create([
            'komentar' => $request->comment,
            'user_id'  => $user->id,
            'postingan_id' => $request->postinganid
            
        ]);

        broadcast(new CommentEvent($user, $commentar , $count));
        return response()->json(['status' => 'Comentar Sent!']);
    }

    public function getComment(){
        return KomentarResource::collection(Comment::get());
     }
     

     public function Commentdestroy($id , $postinganid) {
        $user = Auth::user();
        $comment = Comment::find($id)->delete();
        $postingan = Postingan::find($postinganid);
        // $comment;
        broadcast(new DeletecommentEvent($user , $postingan));
        return response()->json(['status' => 'commentar berhasil di hapus!']);
    
    }


     public function post_subcomment(Request $request){

        $user = Auth::user();
        $subcomment = new Subcomment;
        $comment = Comment::where('id','=',$request->comentarid)->get();

        
        $subcommentar = $subcomment->create([
            'komentar' => $request->subcomment,
            'user_id'  => $user->id,
            'comments_id' => $request->comentarid
            
        ]);

        broadcast(new SubcommentEvent($user, $subcommentar,$comment));
        return response()->json(['status' => 'Subcomment Sent!']);
    }

    public function getSubcomment(){
        return SubKomentarResource::collection(Subcomment::get());
     }


    //  public function countComment($id){
    //     // $count1 = Comment::all()->count();
    //     // $count2 = Subcomment::all()->count();
    //     $count1 = Comment::where('postingan_id','=',$id)->count();
    //     $count2 = DB::table('comments')
    //     ->join('subcomments', 'comments.id', '=', 'subcomments.comments_id')
    //     ->where('postingan_id', $id)
    //     ->count();
    //     // $count = Subcomment::where('postingan_id','=',$id)->count();
    //     return $count1+$count2;
    //  }


    //  public function countSubcomment($id){

    //     // return Subcomment::where('comments_id', '=' , $id)->count();
    //     return CountSubcomentResource::collection(Comment::where('id','=',$id)->get());

    //  }



    public function deleteSubcomment($id , $idcoment) {
        $user = Auth::user();
        $subcomment = Subcomment::find($id)->delete();
        $comentar = Comment::find($idcoment);
        // $comment;
        broadcast(new DeleteSubcommentEvent($user , $comentar));
        return response()->json(['status' => 'Subcommentar berhasil di hapus!']);
    
    }

    public function coba($id){
        return Comment::find($id);
    }
 

}
