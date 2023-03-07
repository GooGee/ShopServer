<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Models\Admin;
use App\Models\Order;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RefundOneOrder
{
    public function __invoke(Admin $user, Order $item)
    {
        if ($item->statusPayment !== Order::StatusPaymentPaid) {
            throw new BadRequestHttpException(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));
        }
        if ($item->status !== Order::StatusReturned) {
            throw new BadRequestHttpException(trans('order.status.not', ['status' => Order::StatusReturned]));
        }

        $item->dtRefund = now();
        $item->statusPayment = Order::StatusPaymentRefunded;
        $item->save();

        event(new RefundOneOrderEvent($user, $item));

        return $item;
    }
}