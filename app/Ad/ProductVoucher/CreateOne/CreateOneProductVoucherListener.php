<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\CreateOne;


use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneProductVoucherListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneProductVoucherEvent $event)
    {
        Log::channel('admin')->info(CreateOneProductVoucherEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneProductVoucherEvent::class, strval($event->item->id));
    }
}