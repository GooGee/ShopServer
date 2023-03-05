<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateMany;

use Illuminate\Support\Facades\Log;

class CreateManyTagListener
{
    function handle(CreateManyTagEvent $event)
    {
        Log::channel('admin')->info(CreateManyTagEvent::class, ['userId' => $event->user->id, 'idzz' => $event->idzz]);
    }
}