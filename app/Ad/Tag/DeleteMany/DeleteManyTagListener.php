<?php

declare(strict_types=1);

namespace App\Ad\Tag\DeleteMany;

use Illuminate\Support\Facades\Log;

class DeleteManyTagListener
{
    function handle(DeleteManyTagEvent $event)
    {
        Log::channel('admin')->info(DeleteManyTagEvent::class, ['userId' => $event->user->id, 'idzz' => $event->idzz]);
    }
}