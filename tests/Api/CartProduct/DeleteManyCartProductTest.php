<?php

declare(strict_types=1);

namespace Tests\Api\CartProduct;

class DeleteManyCartProductTest extends AbstractCartProductTest
{
    public function testDeleteManyCartProduct()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

        $idzz = [$item->id];
        $response = $this->deleteJson($this->makeURI(), compact('idzz'))
            ->assertStatus(401);

        $this->actingAs($user);

        $response = $this->deleteJson($this->makeURI(), [])
            ->assertStatus(422);
        $this->seeErrors(['idzz'], $response);

        self::assertNull($item->dtDelete);
        $idzz = [$item->id];
        $response = $this->deleteJson($this->makeURI(), compact('idzz'))
            ->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $item->refresh();
        self::assertNotNull($item->dtDelete);

    }
}