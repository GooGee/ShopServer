<?php

declare(strict_types=1);

namespace Tests\Api\Address;

class CreateOneAddressTest extends AbstractAddressTest
{
    public function testCreateOneAddress()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($user);


        $data = $item->toArray();
        unset($data['countryId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['countryId'], $response);

        $data = $item->toArray();
        unset($data['zip']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['zip'], $response);

        $data = $item->toArray();
        unset($data['name']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $data = $item->toArray();
        unset($data['phone']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['phone'], $response);

        $data = $item->toArray();
        unset($data['text']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['text'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->countryId, $response->json('item.countryId'));
        self::assertEquals($item->zip, $response->json('item.zip'));
        self::assertEquals($item->name, $response->json('item.name'));
        self::assertEquals($item->phone, $response->json('item.phone'));
        self::assertEquals($item->text, $response->json('item.text'));
    }
}