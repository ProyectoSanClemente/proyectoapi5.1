<?php

namespace App\Providers;
use App\Models\Message;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $ListMessage      = Message::ListMessage();
        $CountNewMessage  = count(Message::CountNewMessage());
        View::share('CountNewMessage',$CountNewMessage);
        View::share('ListMessage',$ListMessage);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
