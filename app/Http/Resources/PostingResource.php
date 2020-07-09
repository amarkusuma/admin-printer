<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Comment;
use DB;

class PostingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'user_id' => $this->user_id,
            'created_at' =>$this->created_at->format('h:i A'),
            'updated_at' => $this->updated_at ,
            'user' => $this->detail_user($this->user_id),
            'countComent' => $this->countComment($this->id),
        ];
    }

    public function detail_user($id){
        $user = User::whereIn('id', [auth()->id(), $id])->first();
        return $user;
    }


    public function countComment($id){
        // $count1 = Comment::all()->count();
        // $count2 = Subcomment::all()->count();
        $count1 = Comment::where('postingan_id','=',$id)->count();
        $count2 = DB::table('comments')
        ->join('subcomments', 'comments.id', '=', 'subcomments.comments_id')
        ->where('postingan_id', $id)
        ->count();
        // $count = Subcomment::where('postingan_id','=',$id)->count();
        return $count1+$count2;
     }
}
