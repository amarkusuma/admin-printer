<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    return Auth::check(); //YANG DI-RETURN ADALAH HANYA TRUE / FALSE
});
Broadcast::channel('Chat', function ($user) {
    return Auth::check(); //YANG DI-RETURN ADALAH HANYA TRUE / FALSE
});

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('Chats', function ($user) {
    return $user;
});

Broadcast::channel('Chats.{session}', function ($user, Session $session) {
    if ($user->id == $session->user1_id || $user->id == $session->user2_id) {
        return true;
    }
    return false;
});
