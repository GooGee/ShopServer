<?php

declare(strict_types=1);

namespace Tests\Ad\Admin;

class CreateOneAdminTest extends AbstractAdminTest
{
    public function testCreateOneAdmin()
    {
        $permission = $this->createPermission('CreateOneAdmin');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['name']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $data = $item->toArray();
        unset($data['email']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['email'], $response);

        $data = $item->toArray();
        unset($data['password']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['password'], $response);

        $data = $item->toArray();
        $data['password'] = 'aa';
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['password'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals($item->name, $response->json('item.name'));
        self::assertNull($response->json('item.password'));

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $item = $this->makeItem($admin);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals($item->name, $response->json('item.name'));
        self::assertEquals($item->email, $response->json('item.email'));
        self::assertNull($response->json('item.password'));
    }
}