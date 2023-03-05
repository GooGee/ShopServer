<?php

declare(strict_types=1);

namespace Tests\Ad\RoleHasPermission;

class CreateOneRoleHasPermissionTest extends AbstractRoleHasPermissionTest
{
    public function testCreateOneRoleHasPermission()
    {
        $permission = $this->createPermission('CreateOneRoleHasPermission');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['permission_id']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['permission_id'], $response);

        $data = $item->toArray();
        unset($data['role_id']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['role_id'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->permission_id, $response->json('item.permission_id'));
        self::assertEquals($item->role_id, $response->json('item.role_id'));
    }
}