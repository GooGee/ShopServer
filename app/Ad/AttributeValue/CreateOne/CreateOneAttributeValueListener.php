<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneAttributeValueListener
{
    function handle(CreateOneAttributeValueEvent $event)
    {
        Log::channel('admin')->info(CreateOneAttributeValueEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}