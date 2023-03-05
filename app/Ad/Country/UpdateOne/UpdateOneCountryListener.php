<?php

declare(strict_types=1);

namespace App\Ad\Country\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneCountryListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneCountryEvent $event)
    {
        Log::channel('admin')->info(UpdateOneCountryEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneCountryEvent::class, strval($event->item->id));
    }
}