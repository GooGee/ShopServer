<?php

declare(strict_types=1);

namespace App\Ad\Trend\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneTrendListener
{
    function handle(CreateOneTrendEvent $event)
    {
        Log::channel('admin')->info(CreateOneTrendEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}