<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Models\Admin;
use App\Models\Order;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FulfillOneOrder
{
    public function __invoke(Admin $user, Order $item)
    {
        if ($item->statusPayment !== Order::StatusPaymentPaid) {
            throw new BadRequestHttpException(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));
        }
        if ($item->status !== Order::StatusPlaced) {
            throw new BadRequestHttpException(trans('order.status.not', ['status' => Order::StatusPlaced]));
        }

        $item->dtFulfill = now();
        $item->status = Order::StatusFulfilled;
        $item->save();

        event(new FulfillOneOrderEvent($user, $item));

        return $item;
    }

}