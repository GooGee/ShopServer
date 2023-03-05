<?php

declare(strict_types=1);

namespace App\Ad\Category\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneCategoryListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneCategoryEvent $event)
    {
        Log::channel('admin')->info(DeleteOneCategoryEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneCategoryEvent::class, strval($event->item->id));
    }
}