<?php

declare(strict_types=1);

namespace Tests\Ad\User;

class DeleteOneUserTest extends AbstractUserTest
{
    public function testDeleteOneUser()
    {
        $permission = $this->createPermission('DeleteOneUser');
        $admin = $this->createAdmin();

        $user = $this->createUser();
        $this->actingAs($user);
        $item = $user;

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        self::assertNull($item->dtDelete);
        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(200);
        $item->refresh();
        self::assertNotNull($item->dtDelete);

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(200);
        $item->refresh();
        self::assertNull($item->dtDelete);
    }
}