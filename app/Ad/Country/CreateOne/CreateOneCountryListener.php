<?php

declare(strict_types=1);

namespace App\Ad\Country\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneCountryListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneCountryEvent $event)
    {
        Log::channel('admin')->info(CreateOneCountryEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneCountryEvent::class, strval($event->item->id));
    }
}