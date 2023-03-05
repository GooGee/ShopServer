<?php

declare(strict_types=1);

namespace Tests\Api\CartProduct;

class UpdateOneCartProductTest extends AbstractCartProductTest
{
    public function testUpdateOneCartProduct()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();
        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(401);

        $other = $this->createUser();
        $this->actingAs($other);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(403);

        $this->actingAs($user);


        $data = $item->toArray();
        unset($data['amount']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['amount'], $response);

        $item->dtUpdate = now();
        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->amount, $response->json('item.amount'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(404);
    }
}