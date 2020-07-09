<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class ChatResource extends JsonResource
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
            'message' => $this->message['message'],
            'user_id' => $this->user_id,
            'id' => $this->id,
            'type' => $this->type,
            'read_at' => $this->read_at_timing($this),
            'send_at' => $this->created_at->diffForHumans(),
            'user' => $this->detail_user($this->user_id)
        ];
    }

    private function read_at_timing($_this)
    {
        $read_at = $_this->type == 0 ? $_this->read_at : null;
        return $read_at ? $read_at->diffForHumans() : null;
    }

    public function detail_user($id){
        $user = User::whereIn('id', [ $id])->first();
        return $user;
    }
}
