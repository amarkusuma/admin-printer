<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Message;
use App\User;
use App\Session;
use App\Grub_message;
use DB;
use Auth;
use Cache;
use App\Http\Resources\ChatResource;
use App\Events\PrivateChatEvent;
use Carbon\Carbon;
use App\Events\MsgReadEvent; 
use App\Http\Resources\UserResource;
    

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat.index');
    }

    public function getMessages()
    {
        //MENGAMBIL SEMUA LOG PESAN BESERTA USER YANG MENJADI PEMILIKNYA MENGGUNAKAN EAGER LOADING
        //PEMBAHASAN MENGENAI EAGER LOADING BISA DI CARI DI DAENGWEB.ID
        return Grub_message::with('user')->get();
    }

    //FUNGSI UNTUK BROADCAST SERTA MENYIMPAN KE DATABASE
    public function broadcastMessage(Request $request)
    {
        $user = Auth::user(); //AMBIL USER YANG SEDANG LOGIN
        //SIMPAN DATA KE TABLE MESSAGES MELALUI USER
        $message = $user->messages()->create([
            'message' => $request->message
        ]);

        //BROADCAST EVENTNYA 
        broadcast(new MessageSent($user, $message))->toOthers();
        return response()->json(['status' => 'Message Sent!']);
    }

    public function online()
    {
        return User::all()->map(function ($user) {
            $user->isOnline = $user->isOnline();
            // if ($user->isOnline) {
            //     return $user->name;
            // }
            return $user;
        });
        // $user =  Auth::user();
        // $user->isOnline = $user->isOnline();
        // if ($user->isOnline) {
        //     return $user;
        // }
    }
    public function send(Session $session, Request $request)
    {
        $user = Auth::user();
        $message = $session->messages()->create([
            'message' => $request->message,
        ]);

        $chat = $message->createForSend($session->id);

        $message->createForReceive($session->id, $request->to_user);

        broadcast(new PrivateChatEvent($message->message, $chat));

        return response($chat->id, 200);
    }

    public function chats(Session $session)
    {
        return ChatResource::collection($session->chats->where('user_id', auth()->id()));
    }

    public function read(Session $session)
    {
        $chats = $session->chats->where('read_at', null)->where('type', 0)->where('user_id', '!=', auth()->id());

        foreach ($chats as $chat) {
            $chat->update(['read_at' => Carbon::now()]);
            broadcast(new MsgReadEvent(new ChatResource($chat), $chat->session_id));
        }
    }

    public function clear(Session $session)
    {
        $session->deleteChats();
        $session->chats->count() == 0 ? $session->deleteMessages() : '';
        return response('cleared', 200);
    }

<<<<<<< HEAD

=======
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
    public function user()
    {
        $data = Auth::user();
        return $data;
    }
<<<<<<< HEAD

    public function getFriends()
    {
        return UserResource::collection(User::where('id', '!=', auth()->id())->get());
    }
=======
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
}
