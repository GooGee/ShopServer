<?php

declare(strict_types=1);

namespace App\Ad\Admin\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneAdminListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneAdminEvent $event)
    {
        Log::channel('admin')->info(UpdateOneAdminEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneAdminEvent::class, strval($event->item->id));
    }
}