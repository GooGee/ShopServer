<?php

declare(strict_types=1);

namespace App\Api\User\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneUserListener
{
    function handle(CreateOneUserEvent $event)
    {
        Log::channel('user')->info(CreateOneUserEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}