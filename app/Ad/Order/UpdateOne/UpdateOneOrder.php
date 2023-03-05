<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Models\Admin;

use App\Repository\OrderRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneOrder
{
    public function __construct(private OrderRepository $repository,
                                private CancelOneOrder  $cancelOneOrder,
                                private FulfillOneOrder $fulfillOneOrder,
                                private RefundOneOrder  $refundOneOrder,
    )
    {
    }

    function __invoke(int     $id, Admin $user,
                      ?string $dtCancel,
                      ?string $dtFulfill,
                      ?string $dtRefund,
    )
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        if ($dtCancel) {
            return $this->cancelOneOrder->__invoke($user, $item);
        }

        if ($dtFulfill) {
            return $this->fulfillOneOrder->__invoke($user, $item);
        }

        if ($dtRefund) {
            return $this->refundOneOrder->__invoke($user, $item);
        }

        throw new BadRequestHttpException(trans('order.ad.operation'));

        $item->save();

        event(new UpdateOneOrderEvent($user, $item));

        return $item;
    }

}