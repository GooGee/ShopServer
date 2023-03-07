<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

use App\Models\Order;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ReturnOneOrder
{

    public function __invoke(User $user, Order $item)
    {
        if ($item->statusPayment !== Order::StatusPaymentPaid) {
            throw new BadRequestHttpException(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));
        }
        if ($item->status !== Order::StatusFulfilled) {
            throw new BadRequestHttpException(trans('order.status.not', ['status' => Order::StatusFulfilled]));
        }

        $item->dtReturn = now();
        $item->status = Order::StatusReturned;
        $item->save();

        event(new ReturnOneOrderEvent($user, $item));

        return $item;

    }
}