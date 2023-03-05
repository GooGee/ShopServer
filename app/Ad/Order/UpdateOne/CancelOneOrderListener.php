<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use App\Models\Admin;
use App\Repository\AdminRepository;
use Illuminate\Support\Facades\Log;

class CancelOneOrderListener
{
    public function __construct(private CreateOneOperation        $createOneOperation,
                                private IncreaseOrderProductStock $increaseProductSku,
                                private AdminRepository           $adminRepository)
    {
    }

    function handle(CancelOneOrderEvent $event)
    {
        $user = $event->user;
        if ($user instanceof Admin) {
            // ok
        } else {
            $user = $this->adminRepository->getSystemAdmin();
        }
        $this->increaseProductSku->run($user, $event->item);

        Log::channel('admin')->info(CancelOneOrderEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($user, CancelOneOrderEvent::class, strval($event->item->id));
    }
}