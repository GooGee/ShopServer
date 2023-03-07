<?php

declare(strict_types=1);

namespace Tests\Api\Order;

use App\Models\Order;

class UpdateOneOrderTest extends AbstractOrderTest
{
    public function testUpdateOneOrder()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();
        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(401);

        $other = $this->createUser();
        $this->actingAs($other);
        $data = $item->toArray();
        unset($data['dtCancel']);
        unset($data['dtReceive']);
        unset($data['dtReturn']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(403);

        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);

        $data = $item->toArray();
        unset($data['dtCancel']);
        unset($data['dtReceive']);
        unset($data['dtReturn']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.api.operation'));

        // cancel
        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtCancel'] = now();
        unset($data['dtReceive']);
        unset($data['dtReturn']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals(Order::StatusCancelled, $response->json('item.status'));

        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->status = Order::StatusCancelled;
        $item->save();
        $data = $item->toArray();
        $data['dtCancel'] = now();
        unset($data['dtReceive']);
        unset($data['dtReturn']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.status.not', ['status' => Order::StatusPlaced]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtCancel'] = now();
        unset($data['dtReceive']);
        unset($data['dtReturn']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.cancel.not'));

        // receive
        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtReceive'] = now();
        unset($data['dtCancel']);
        unset($data['dtReturn']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtReceive'] = now();
        unset($data['dtCancel']);
        unset($data['dtReturn']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.status.not', ['status' => Order::StatusFulfilled]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusFulfilled;
        $item->save();
        $data = $item->toArray();
        $data['dtReceive'] = now();
        unset($data['dtCancel']);
        unset($data['dtReturn']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals(Order::StatusReceived, $response->json('item.status'));

        // return
        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtReturn'] = now();
        unset($data['dtCancel']);
        unset($data['dtReceive']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtReturn'] = now();
        unset($data['dtCancel']);
        unset($data['dtReceive']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.status.not', ['status' => Order::StatusFulfilled]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusFulfilled;
        $item->save();
        $data = $item->toArray();
        $data['dtReturn'] = now();
        unset($data['dtCancel']);
        unset($data['dtReceive']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals(Order::StatusReturned, $response->json('item.status'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(404);
    }
}