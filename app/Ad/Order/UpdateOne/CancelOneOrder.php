<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Models\AbstractUser;
use App\Models\Order;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CancelOneOrder
{

    public function __invoke(AbstractUser $user, Order $item)
    {
        if ($item->statusPayment === Order::StatusPaymentUnpaid) {
            if ($item->status !== Order::StatusPlaced) {
                throw new BadRequestHttpException(trans('order.status.not', ['status' => Order::StatusPlaced]));
            }
            $item->dtCancel = now();
            $item->status = Order::StatusCancelled;
        } else {
            throw new BadRequestHttpException(trans('order.cancel.not'));
        }

        $item->save();

        event(new CancelOneOrderEvent($user, $item));

        return $item;
    }
}