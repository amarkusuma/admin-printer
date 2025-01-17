<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $guarded = [];

    public function chats()
    {
        return $this->hasManyThrough(Chat::class, Message::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // public function sendMessage($session_id)
    // {
    //     return $this->messages()->create([
    //         'session_id' => $session_id,
    //         // 'type' => 0,
    //         'user_id' => auth()->id()
    //     ]);
    // }


    public function deleteChats()
    {
        $this->chats()->where('user_id', auth()->id())->delete();
    }

    public function deleteMessages()
    {
        $this->messages()->delete();
    }

    // public function block()
    // {
    //     $this->block = true;
    //     $this->blocked_by = auth()->id();
    //     $this->save();
    // }

    // public function unblock()
    // {
    //     $this->block = false;
    //     $this->blocked_by = null;
    //     $this->save();
    // }
}
