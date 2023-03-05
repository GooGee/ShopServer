<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

use App\Ad\Order\UpdateOne\CancelOneOrder;
use App\Models\User;
use App\Repository\OrderRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneOrder
{
    public function __construct(private OrderRepository $repository,
                                private CancelOneOrder  $cancelOneOrder,
                                private ReceiveOneOrder $receiveOneOrder,
                                private ReturnOneOrder  $returnOneOrder,
    )
    {
    }

    function __invoke(int     $id, User $user,
                      ?string $dtCancel,
                      ?string $dtReceive,
                      ?string $dtReturn,)
    {
        $item = $this->repository->findOrFail($id);

        if ($user->id === $item->userId) {
            //
        } else {
            throw new AccessDeniedHttpException("Cannot modify user $user->name's order");
        }

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        if ($dtCancel) {
            return $this->cancelOneOrder->__invoke($user, $item);
        }

        if ($dtReceive) {
            return $this->receiveOneOrder->__invoke($user, $item);
        }

        if ($dtReturn) {
            return $this->returnOneOrder->__invoke($user, $item);
        }

        throw new BadRequestHttpException(trans('order.api.operation'));

        $item->save();

        event(new UpdateOneOrderEvent($user, $item));

        return $item;
    }

}