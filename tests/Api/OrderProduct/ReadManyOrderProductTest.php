<?php

declare(strict_types=1);

namespace Tests\Api\OrderProduct;

class ReadManyOrderProductTest extends AbstractOrderProductTest
{
    public function testReadManyOrderProduct()
    {
        $user = $this->createUser();

        $item = $this->makeItem($user);
        $item->save();
        $orderId = $item->orderId;
        $response = $this->json('GET', $this->makeURI(), compact('orderId'))
            ->assertStatus(401);

        $this->actingAs($user);

        $response = $this->json('GET', $this->makeURI(), compact('orderId'))
            ->assertStatus(200);
        $this->seeItemzz(self::structure(), $response);
        self::assertEquals($orderId, $response->json('itemzz.0.orderId'));
    }
}