<?php

declare(strict_types=1);

namespace Tests\Api\OrderProduct;

class ReadOneOrderProductTest extends AbstractOrderProductTest
{
    public function testReadOneOrderProduct()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();
        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(401);

        $this->actingAs($user);

        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals($item->id, $response->json('item.id'));
        self::assertNull($response->json('item.dtDelete'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}