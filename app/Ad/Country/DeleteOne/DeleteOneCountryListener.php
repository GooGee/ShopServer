<?php

declare(strict_types=1);

namespace App\Ad\Country\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneCountryListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneCountryEvent $event)
    {
        Log::channel('admin')->info(DeleteOneCountryEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneCountryEvent::class, strval($event->item->id));
    }
}