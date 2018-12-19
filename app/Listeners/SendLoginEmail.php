<?php

namespace App\Listeners;

use App\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendLoginEmail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
//        $user = $event->user;
//        if($user['email']){
//            Mail::raw('你好，我是Jack的网站！', function ($message) use($user) {
//                $message ->to($user['email'])->subject('你刚刚登陆了Jack的网站');
//            });
//        }
    }
}
