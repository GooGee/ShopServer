<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneModelHasRoleListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneModelHasRoleEvent $event)
    {
        Log::channel('admin')->info(CreateOneModelHasRoleEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneModelHasRoleEvent::class, strval($event->item->id));
    }
}