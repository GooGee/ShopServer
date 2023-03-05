<?php

declare(strict_types=1);

namespace Tests\Api\CartProduct;

class CreateOneCartProductTest extends AbstractCartProductTest
{
    public function testCreateOneCartProduct()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($user);


        $data = $item->toArray();
        unset($data['productSkuId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['productSkuId'], $response);

        $data = $item->toArray();
        unset($data['amount']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['amount'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->productSkuId, $response->json('item.productSkuId'));
        self::assertEquals($item->amount, $response->json('item.amount'));
    }
}