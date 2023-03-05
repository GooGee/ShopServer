<?php

declare(strict_types=1);

namespace App\Api\CartProduct\DeleteMany;

use Illuminate\Support\Facades\Log;

class DeleteManyCartProductListener
{
    function handle(DeleteManyCartProductEvent $event)
    {
        Log::channel('user')->info(DeleteManyCartProductEvent::class, ['userId' => $event->user->id, 'idzz' => $event->idzz]);
    }
}