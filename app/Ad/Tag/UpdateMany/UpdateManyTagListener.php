<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateMany;

use Illuminate\Support\Facades\Log;

class UpdateManyTagListener
{
    function handle(UpdateManyTagEvent $event)
    {
        Log::channel('admin')->info(UpdateManyTagEvent::class, ['userId' => $event->user->id, 'idzz' => $event->idzz]);
    }
}