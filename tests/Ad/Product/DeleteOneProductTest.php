<?php

declare(strict_types=1);

namespace Tests\Ad\Product;

use App\Ad\Product\CreateOne\CreateOneProductEvent;

class DeleteOneProductTest extends AbstractProductTest
{
    public function testDeleteOneProduct()
    {
        $permission = $this->createPermission('DeleteOneProduct');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);
        $item->save();

        event(new CreateOneProductEvent($admin, $item));

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