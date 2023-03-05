<?php

declare(strict_types=1);

namespace App\Ad\Voucher\UpdateOne;


use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneVoucherListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneVoucherEvent $event)
    {
        Log::channel('admin')->info(UpdateOneVoucherEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneVoucherEvent::class, strval($event->item->id));
    }
}