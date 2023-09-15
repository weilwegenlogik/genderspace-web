<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GlobalMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    view()->composer('*', function ($view) {
        if (auth()->check()) {
            $user = auth()->user();
            
            // Instead of only fetching the latest message, you should fetch all the messages.
            $messages = GlobalMessage::whereNotIn('id', auth()->user()->unsubscribedMessages->pluck('id')->toArray())->get();
            $view->with('globalMessages', $messages);

        }
    });
}


}
