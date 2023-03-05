<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneOrderProductListener
{
    function handle(CreateOneOrderProductEvent $event)
    {
        Log::channel('user')->info(CreateOneOrderProductEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}