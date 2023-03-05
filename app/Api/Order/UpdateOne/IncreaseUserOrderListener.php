<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

use App\Api\User\UpdateOne\UpdateOneUser;

class IncreaseUserOrderListener
{
    public function __construct(private UpdateOneUser $updateOneUser)
    {
    }

    function handle(PayOneOrderEvent $event)
    {
        $this->updateOneUser->increaseOrder($event->user, $event->item->sum);
    }
}