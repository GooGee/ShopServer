<?php

declare(strict_types=1);

namespace App\Ad\Page\UpdateOne;

use Illuminate\Support\Facades\Log;

class UpdateOnePageListener
{
    function handle(UpdateOnePageEvent $event)
    {
        Log::channel('admin')->info(UpdateOnePageEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}