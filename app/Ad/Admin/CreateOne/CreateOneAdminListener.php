<?php

declare(strict_types=1);

namespace App\Ad\Admin\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneAdminListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneAdminEvent $event)
    {
        Log::channel('admin')->info(CreateOneAdminEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneAdminEvent::class, strval($event->item->id));
    }
}