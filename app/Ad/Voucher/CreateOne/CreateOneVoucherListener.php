<?php

declare(strict_types=1);

namespace App\Ad\Voucher\CreateOne;


use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneVoucherListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneVoucherEvent $event)
    {
        Log::channel('admin')->info(CreateOneVoucherEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneVoucherEvent::class, strval($event->item->id));
    }
}