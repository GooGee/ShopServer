<?php

declare(strict_types=1);

namespace Tests\Ad\Order;

use App\Models\Order;

class UpdateOneOrderTest extends AbstractOrderTest
{
    public function testUpdateOneOrder()
    {
        $permission = $this->createPermission('UpdateOneOrder');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);
        $item->save();

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $data = $item->toArray();
        unset($data['dtCancel']);
        unset($data['dtFulfill']);
        unset($data['dtRefund']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);

        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.ad.operation'));

        // cancel
        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtCancel'] = now();
        unset($data['dtFulfill']);
        unset($data['dtRefund']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals(Order::StatusCancelled, $response->json('item.status'));

        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->status = Order::StatusCancelled;
        $item->save();
        $data = $item->toArray();
        $data['dtCancel'] = now();
        unset($data['dtFulfill']);
        unset($data['dtRefund']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.status.not', ['status' => Order::StatusPlaced]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtCancel'] = now();
        unset($data['dtFulfill']);
        unset($data['dtRefund']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.cancel.not'));

        // fulfill
        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtFulfill'] = now();
        unset($data['dtCancel']);
        unset($data['dtRefund']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtFulfill'] = now();
        unset($data['dtCancel']);
        unset($data['dtRefund']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals(Order::StatusFulfilled, $response->json('item.status'));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusFulfilled;
        $item->save();
        $data = $item->toArray();
        $data['dtFulfill'] = now();
        unset($data['dtCancel']);
        unset($data['dtRefund']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.status.not', ['status' => Order::StatusPlaced]));

        // refund
        $item->statusPayment = Order::StatusPaymentUnpaid;
        $item->status = Order::StatusPlaced;
        $item->save();
        $data = $item->toArray();
        $data['dtRefund'] = now();
        unset($data['dtCancel']);
        unset($data['dtFulfill']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.payment.status.not', ['status' => Order::StatusPaymentPaid]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusFulfilled;
        $item->save();
        $data = $item->toArray();
        $data['dtRefund'] = now();
        unset($data['dtCancel']);
        unset($data['dtFulfill']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('order.status.not', ['status' => Order::StatusReturned]));

        $item->statusPayment = Order::StatusPaymentPaid;
        $item->status = Order::StatusReturned;
        $item->save();
        $data = $item->toArray();
        $data['dtRefund'] = now();
        unset($data['dtCancel']);
        unset($data['dtFulfill']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals(Order::StatusPaymentRefunded, $response->json('item.statusPayment'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(404);
    }
}