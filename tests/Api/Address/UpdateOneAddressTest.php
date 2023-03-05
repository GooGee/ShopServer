<?php

declare(strict_types=1);

namespace Tests\Api\Address;

class UpdateOneAddressTest extends AbstractAddressTest
{
    public function testUpdateOneAddress()
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
        unset($data['zip']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['zip'], $response);

        $data = $item->toArray();
        unset($data['name']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $data = $item->toArray();
        unset($data['phone']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['phone'], $response);

        $data = $item->toArray();
        unset($data['text']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['text'], $response);

        $item->dtUpdate = now();
        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->zip, $response->json('item.zip'));
        self::assertEquals($item->name, $response->json('item.name'));
        self::assertEquals($item->phone, $response->json('item.phone'));
        self::assertEquals($item->text, $response->json('item.text'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(404);
    }
}