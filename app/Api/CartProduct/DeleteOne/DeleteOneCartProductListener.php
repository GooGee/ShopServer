<?php

declare(strict_types=1);

namespace App\Api\CartProduct\DeleteOne;

use Illuminate\Support\Facades\Log;

class DeleteOneCartProductListener
{
    function handle(DeleteOneCartProductEvent $event)
    {
        Log::channel('user')->info(DeleteOneCartProductEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}