<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneModelHasRoleListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneModelHasRoleEvent $event)
    {
        Log::channel('admin')->info(DeleteOneModelHasRoleEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneModelHasRoleEvent::class, strval($event->item->id));
    }
}