<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen('generic.event',function($client_data){
            return \BrainSocket::message('generic.event',array('message'=>'A message from a generic event fired in Laravel!'));
        });

        Event::listen('app.success',function($client_data){
            return \BrainSocket::success(array('There was a Laravel App Success Event!'));
        });

        Event::listen('app.error',function($client_data){
            return \BrainSocket::error(array('There was a Laravel App Error!'));
        });
    }
}
