<?php

declare(strict_types=1);

namespace App\Api\CartProduct\UpdateOne;

use Illuminate\Support\Facades\Log;

class UpdateOneCartProductListener
{
    function handle(UpdateOneCartProductEvent $event)
    {
        Log::channel('user')->info(UpdateOneCartProductEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}