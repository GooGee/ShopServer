<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

use App\Models\Order;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class PayOneOrder
{
    function run(User $user, Order $item)
    {
        if ($item->statusPayment !== Order::StatusPaymentUnpaid) {
            throw new BadRequestHttpException(trans('order.payment.status.not', ['status' => Order::StatusPaymentUnpaid]));
        }
        if ($item->status !== Order::StatusPlaced) {
            throw new BadRequestHttpException(trans('order.status.not', ['status' => Order::StatusPlaced]));
        }

        $item->dtPay = now();
        $item->statusPayment = Order::StatusPaymentPaid;
        $item->save();

        event(new PayOneOrderEvent($user, $item));

        return $item;
    }
}