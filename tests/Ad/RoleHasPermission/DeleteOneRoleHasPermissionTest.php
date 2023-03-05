<?php

declare(strict_types=1);

namespace Tests\Ad\RoleHasPermission;

class DeleteOneRoleHasPermissionTest extends AbstractRoleHasPermissionTest
{
    public function testDeleteOneRoleHasPermission()
    {
        $permission = $this->createPermission('DeleteOneRoleHasPermission');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);
        $item->save();

        $user = $this->createUser();
        $this->actingAs($user);

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(200);
        $this->assertDatabaseEmpty($item);

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}