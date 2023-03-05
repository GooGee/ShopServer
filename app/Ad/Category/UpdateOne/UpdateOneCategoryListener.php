<?php

declare(strict_types=1);

namespace App\Ad\Category\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneCategoryListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneCategoryEvent $event)
    {
        Log::channel('admin')->info(UpdateOneCategoryEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneCategoryEvent::class, strval($event->item->id));
    }
}