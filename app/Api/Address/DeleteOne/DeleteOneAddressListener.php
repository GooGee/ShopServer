<?php

declare(strict_types=1);

namespace App\Api\Address\DeleteOne;

use Illuminate\Support\Facades\Log;

class DeleteOneAddressListener
{
    function handle(DeleteOneAddressEvent $event)
    {
        Log::channel('user')->info(DeleteOneAddressEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}