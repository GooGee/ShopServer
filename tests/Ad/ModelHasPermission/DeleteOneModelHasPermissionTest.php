<?php

declare(strict_types=1);

namespace Tests\Ad\ModelHasPermission;

class DeleteOneModelHasPermissionTest extends AbstractModelHasPermissionTest
{
    public function testDeleteOneModelHasPermission()
    {
        $permission = $this->createPermission('DeleteOneModelHasPermission');
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
        $this->assertDatabaseCount($item, 2);
        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(200);
        $this->assertDatabaseCount($item, 1);

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}