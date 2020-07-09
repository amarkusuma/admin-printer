<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User ;

class SubKomentarResource extends JsonResource
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
            'comments_id' => $this->comments_id,
            'user_id' => $this->user_id,
            'komentar' => $this->komentar,
            'icon' =>$this->icon,
            'created_at' =>$this->created_at->format('h:i A'),
            'user' => $this->detail_user($this->user_id)
        ];
    }

    public function detail_user($id){
        $user = User::whereIn('id', [ $id])->first();
        return $user;
    }
}
