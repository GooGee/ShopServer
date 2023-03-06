<?php

declare(strict_types=1);

namespace Tests\Ad\User;

class ReadOneUserTest extends AbstractUserTest
{
    public function testReadOneUser()
    {
        $permission = $this->createPermission('ReadOneUser');
        $admin = $this->createAdmin();

        $user = $this->createUser();
        $this->actingAs($user);
        $item = $user;

        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals($item->id, $response->json('item.id'));
        self::assertNull($response->json('item.dtDelete'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(200);
    }
}