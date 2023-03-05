<?php

declare(strict_types=1);

namespace Tests\Ad\Product;

use Database\Factories\ProductVoucherFactory;

class ReadOneProductTest extends AbstractProductTest
{
    public function testReadOneProduct()
    {
        $permission = $this->createPermission('ReadOneProduct');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);
        $item->save();

        ProductVoucherFactory::new()->for($item)->create();

        $user = $this->createUser();
        $this->actingAs($user);

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
        $response->assertJsonPath('item.id', $item->id);
        self::assertNull($response->json('item.dtDelete'));
        self::assertCount(1, $response->json('item.voucherzz'));
        self::assertNotNull($response->json('item.voucherzz.0.pivot'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->getJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}