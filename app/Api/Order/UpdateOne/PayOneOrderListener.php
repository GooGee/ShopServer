<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

use Illuminate\Support\Facades\Log;

class PayOneOrderListener
{
    function handle(PayOneOrderEvent $event)
    {
        Log::channel('user')->info(PayOneOrderEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}