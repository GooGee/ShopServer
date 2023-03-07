<?php

declare(strict_types=1);

namespace App\Api\Review\CreateOne;

use App\AbstractBase\AbstractController;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repository\OrderProductRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class CreateOneReviewController extends AbstractController
{
    public function __invoke(CreateOneReviewRequest $request,
                             CreateOneReview        $create,
                             OrderProductRepository $orderProductRepository,
    )
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        /** @type OrderProduct $op */
        $op = $orderProductRepository->query()
            ->leftJoin('Order', 'Order.id', '=', 'OrderProduct.orderId')
            ->leftJoin('ProductSku', 'ProductSku.id', '=', 'OrderProduct.productSkuId')
            ->where('Order.userId', $user->id)
            ->where('ProductSku.productId', $request->validated('productId'))
            ->orderBy('Order.id', 'desc')
            ->firstOrFail();
        if ($op->order->statusPayment !== Order::StatusPaymentPaid) {
            throw new BadRequestHttpException(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));
        }
        if (in_array($op->order->status, [Order::StatusFulfilled, Order::StatusReceived, Order::StatusReturned])) {
            // ok
        } else {
            throw new BadRequestHttpException(trans('review.not'));
        }

        $item = $create($user,

            $request->validated('text'),
            $request->validated('productId'),
            $request->validated('rating'),
            $op->orderId,
        );

        return CreateOneReviewResponse::sendItem($item);
    }
}