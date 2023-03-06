<?php

declare(strict_types=1);

namespace Tests\Ad\Admin;

class ReadOneAdminTest extends AbstractAdminTest
{
    public function testReadOneAdmin()
    {
        $permission = $this->createPermission('ReadOneAdmin');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);
        $item->save();

        $user = $this->createUser();
        $this->actingAs($user);

        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(403);

        $admin->givePermissionTo($permission);
        $item->givePermissionTo($permission);
        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals($item->id, $response->json('item.id'));
        self::assertNull($response->json('item.dtDelete'));
        self::assertCount(1, $response->json('item.permissionzz'));
        self::assertNotNull($response->json('item.permissionzz.0.pivot'));
        self::assertCount(0, $response->json('item.rolezz'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(200);
    }
}