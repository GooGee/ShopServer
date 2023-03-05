<?php

declare(strict_types=1);

namespace Tests\Api\User;

class CreateOneUserTest extends AbstractUserTest
{
    public function testCreateOneUser()
    {
        $user = $this->createUser();

        $data = $this->makeItem($user)->toArray();
        unset($data['name']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $data = $this->makeItem($user)->toArray();
        unset($data['email']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['email'], $response);

        $data = $this->makeItem($user)->toArray();
        unset($data['password']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['password'], $response);

        $data = $this->makeItem($user)->toArray();
        $data['password'] = 'aa';
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['password'], $response);

        $item = $this->makeItem($user);
        $item->makeVisible('password');
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->name, $response->json('item.name'));
        self::assertNull($response->json('item.email'));
        self::assertNull($response->json('item.password'));

        $item = $this->makeItem($user);
        $item->makeVisible('password');
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->name, $response->json('item.name'));
        self::assertNull($response->json('item.email'));
        self::assertNull($response->json('item.password'));

    }
}