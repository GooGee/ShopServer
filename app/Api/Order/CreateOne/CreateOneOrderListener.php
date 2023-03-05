<?php

declare(strict_types=1);

namespace App\Api\Order\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneOrderListener
{
    function handle(CreateOneOrderEvent $event)
    {
        Log::channel('user')->info(CreateOneOrderEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}