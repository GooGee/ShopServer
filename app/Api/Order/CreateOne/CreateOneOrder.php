<?php

declare(strict_types=1);

namespace App\Api\Order\CreateOne;

use App\Models\User;

use App\Models\Order;
use App\Repository\OrderRepository;

class CreateOneOrder
{
    public function __construct(private OrderRepository $repository)
    {
    }

    function __invoke(User $user,
                      int  $sum,
                      int  $addressId,
    )
    {
        $item = new Order();
        $item->userId = $user->id;
        $item->status = Order::StatusPlaced;
        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->dtExpire = now()->addHours(22);
        $item->sum = $sum;
        $item->addressId = $addressId;

        $item->save();
        $item->refresh();

        event(new CreateOneOrderEvent($user, $item));

        return $item;
    }

}