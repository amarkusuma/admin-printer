<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Subcomment;

class KomentarResource extends JsonResource
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
            'postingan_id' => $this->postingan_id,
            'user_id' => $this->user_id,
            'komentar' => $this->komentar,
            'icon' =>$this->icon,
            'created_at' =>$this->created_at->format('h:i A'),
            'user' => $this->detail_user($this->user_id),
            'count' => $this->countSubcomment($this->id)
        ];
    }

    public function detail_user($id){
        $user = User::whereIn('id', [ $id])->first();
        return $user;
    }

    public function countSubcomment($id){
        return Subcomment::where('comments_id', '=' , $id)->count();
     }
}
