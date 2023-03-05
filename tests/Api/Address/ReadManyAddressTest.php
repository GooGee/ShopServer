<?php

declare(strict_types=1);

namespace Tests\Api\Address;

class ReadManyAddressTest extends AbstractAddressTest
{
    public function testReadManyAddress()
    {
        $user = $this->createUser();

        $item = $this->makeItem($user);
        $item->save();
        $idzz = [$item->id];
        $response = $this->json('GET', $this->makeURI(), compact('idzz'))
            ->assertStatus(401);

        $this->actingAs($user);

        $response = $this->json('GET', $this->makeURI(), compact('idzz'))
            ->assertStatus(200);
        $this->seeItemzz(self::structure(), $response);
        $response->assertJsonCount(1, 'itemzz');
    }
}