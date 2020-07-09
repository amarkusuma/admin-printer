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

<<<<<<< HEAD
// Broadcast::channel('chat', function ($user) {
//     return Auth::check(); //YANG DI-RETURN ADALAH HANYA TRUE / FALSE
// });
// Broadcast::channel('chat', function ($user) {
=======
Broadcast::channel('chat', function ($user) {
    return Auth::check(); //YANG DI-RETURN ADALAH HANYA TRUE / FALSE
});
// Broadcast::channel('Chat', function ($user) {
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4
//     return Auth::check(); //YANG DI-RETURN ADALAH HANYA TRUE / FALSE
// });

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('chat', function ($user) {
    return $user;
});

Broadcast::channel('chat.{session}', function ($user,$session) {
    // if ($user->id == $session->user1_id || $user->id == $session->user2_id) {
    //     return true;
    // }
    // return false;
    
    return $user ;
});

Broadcast::channel(`posting`, function () {
    return true;
});

Broadcast::channel(`comentar`, function () {
    return true ;
});
Broadcast::channel(`subcomentar`, function () {
    return true ;
});
Broadcast::channel('deleteComment', function ($user) {
    return $user;
});
Broadcast::channel('deletePostingan', function ($user) {
    return $user;
});
Broadcast::channel('deleteSubcomment', function ($user) {
    return $user;
});