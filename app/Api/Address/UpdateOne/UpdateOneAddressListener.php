<?php

declare(strict_types=1);

namespace App\Api\Address\UpdateOne;

use Illuminate\Support\Facades\Log;

class UpdateOneAddressListener
{
    function handle(UpdateOneAddressEvent $event)
    {
        Log::channel('user')->info(UpdateOneAddressEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}