<?php

declare(strict_types=1);

namespace Tests\Ad\Page;

class DeleteOnePageTest extends AbstractPageTest
{
    public function testDeleteOnePage()
    {
        $permission = $this->createPermission('DeleteOnePage');
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
        self::assertNull($item->dtDelete);
        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(200);
        $item->refresh();
        self::assertNotNull($item->dtDelete);

        $response = $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}