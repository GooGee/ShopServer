<?php

declare(strict_types=1);

namespace App\Api\User\UpdateOne;

use Illuminate\Support\Facades\Log;

class UpdateOneUserListener
{
    function handle(UpdateOneUserEvent $event)
    {
        Log::channel('user')->info(UpdateOneUserEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}