<?php

declare(strict_types=1);

namespace Tests\Api\Order;

use App\Models\OrderProduct;
use Tests\Api\CartProduct\AbstractCartProductTest;

class CreateOneOrderTest extends AbstractOrderTest
{
    public function testCreateOneOrder()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($user);

        $cp = AbstractCartProductTest::makeItem($user, ['amount' => 2]);
        $cp->save();
        $cp->productSku->stock = 1;
        $cp->productSku->save();
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(400);

        $cp->amount = 1;
        $cp->save();
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertGreaterThanOrEqual($cp->amount * 1000, $response->json('item.sum'));
        $cp->refresh();
        self::assertNotNull($cp->dtDelete);
        /** @var OrderProduct $op */
        $op = OrderProduct::query()->first();
        $response->assertJsonPath('item.id', $op->orderId);
        $this->assertEquals($op->productSkuId, $cp->productSkuId);
    }
}