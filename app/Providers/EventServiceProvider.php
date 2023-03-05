<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [];

    public function register()
    {
        parent::register();

        foreach (AdminEvent::Eventzz as $key => $itemzz) {
            $this->listen[$key] = $itemzz;
        }
        foreach (ApiEvent::Eventzz as $key => $itemzz) {
            $this->listen[$key] = $itemzz;
        }
    }

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
