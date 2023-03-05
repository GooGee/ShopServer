<?php

declare(strict_types=1);

namespace App\Api\Address\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneAddressListener
{
    function handle(CreateOneAddressEvent $event)
    {
        Log::channel('user')->info(CreateOneAddressEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}