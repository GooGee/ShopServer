<?php

declare(strict_types=1);

namespace App\Ad\Category\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneCategoryListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneCategoryEvent $event)
    {
        Log::channel('admin')->info(CreateOneCategoryEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneCategoryEvent::class, strval($event->item->id));
    }
}