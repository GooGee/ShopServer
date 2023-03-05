<?php

declare(strict_types=1);

namespace App\Api\CartProduct\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneCartProductListener
{
    function handle(CreateOneCartProductEvent $event)
    {
        Log::channel('user')->info(CreateOneCartProductEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}