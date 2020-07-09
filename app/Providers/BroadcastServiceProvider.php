<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        // Broadcast::routes(['middleware' => 'auth']);
        Broadcast::routes();
=======
        Broadcast::routes(['middleware' => ['auth:api']]);
>>>>>>> 1f5914a252bc386a724dddcbee8858e6935bbef4

        require base_path('routes/channels.php');
    }
}
