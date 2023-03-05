<?php

declare(strict_types=1);

namespace App\Ad\Admin\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneAdminListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneAdminEvent $event)
    {
        Log::channel('admin')->info(DeleteOneAdminEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneAdminEvent::class, strval($event->item->id));
    }
}