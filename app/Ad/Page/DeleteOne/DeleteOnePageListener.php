<?php

declare(strict_types=1);

namespace App\Ad\Page\DeleteOne;

use Illuminate\Support\Facades\Log;

class DeleteOnePageListener
{
    function handle(DeleteOnePageEvent $event)
    {
        Log::channel('admin')->info(DeleteOnePageEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}