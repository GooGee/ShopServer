<?php

declare(strict_types=1);

namespace Tests\Api\Address;

class DeleteOneAddressTest extends AbstractAddressTest
{
    public function testDeleteOneAddress()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();
        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(401);

        $other = $this->createUser();
        $this->actingAs($other);

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(403);

        $this->actingAs($user);

        self::assertNull($item->dtDelete);
        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(200);
        $item->refresh();
        self::assertNotNull($item->dtDelete);

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}