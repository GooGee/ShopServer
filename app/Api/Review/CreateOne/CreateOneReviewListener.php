<?php

declare(strict_types=1);

namespace App\Api\Review\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneReviewListener
{
    function handle(CreateOneReviewEvent $event)
    {
        Log::channel('user')->info(CreateOneReviewEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}