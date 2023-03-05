<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

use Illuminate\Support\Facades\Log;

class UpdateOneOrderListener
{
    function handle(UpdateOneOrderEvent $event)
    {
        Log::channel('user')->info(UpdateOneOrderEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}