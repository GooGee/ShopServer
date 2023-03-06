<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\DeleteOne;


use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneProductVoucherListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneProductVoucherEvent $event)
    {
        Log::channel('admin')->info(DeleteOneProductVoucherEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneProductVoucherEvent::class, strval($event->item->id));
    }
}