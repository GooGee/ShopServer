<?php
declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class RefundOneOrderListener
{
    public function __construct(private CreateOneOperation $createOneOperation, private IncreaseOrderProductStock $increaseOrderProductSku)
    {
    }

    function handle(RefundOneOrderEvent $event)
    {
        $this->increaseOrderProductSku->run($event->user, $event->item);

        Log::channel('admin')->info(RefundOneOrderEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, RefundOneOrderEvent::class, strval($event->item->id));
    }
}