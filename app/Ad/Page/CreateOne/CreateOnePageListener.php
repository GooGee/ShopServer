<?php

declare(strict_types=1);

namespace App\Ad\Page\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOnePageListener
{
    function handle(CreateOnePageEvent $event)
    {
        Log::channel('admin')->info(CreateOnePageEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}