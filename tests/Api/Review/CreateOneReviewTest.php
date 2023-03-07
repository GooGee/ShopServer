<?php

declare(strict_types=1);

namespace Tests\Api\Review;

use App\Models\Order;
use Tests\Api\Order\AbstractOrderTest;
use Tests\Api\OrderProduct\AbstractOrderProductTest;

class CreateOneReviewTest extends AbstractReviewTest
{
    public function testCreateOneReview()
    {
        $user = $this->createUser();
        $order = AbstractOrderTest::makeItem($user);
        $order->save();
        $op = AbstractOrderProductTest::makeItem($user, ['orderId' => $order->id]);
        $op->save();

        $item = $this->makeItem($user, ['productId' => $op->productSku->productId]);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($user);


        $data = $item->toArray();
        unset($data['text']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['text'], $response);

        $data = $item->toArray();
        unset($data['productId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['productId'], $response);

        $data = $item->toArray();
        unset($data['rating']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['rating'], $response);

        $data = $item->toArray();
        $order->statusPayment = Order::StatusPaymentUnpaid;
        $order->status = Order::StatusPlaced;
        $order->save();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));

        $order->statusPayment = Order::StatusPaymentPaid;
        $order->status = Order::StatusPlaced;
        $order->save();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('review.not'));

        $order->statusPayment = Order::StatusPaymentPaid;
        $order->status = Order::StatusFulfilled;
        $order->save();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        $response->assertJsonPath('item.text', $item->text);
        $response->assertJsonPath('item.productId', $item->productId);
        $response->assertJsonPath('item.rating', $item->rating);
    }
}