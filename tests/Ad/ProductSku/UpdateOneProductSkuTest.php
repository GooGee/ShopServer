<?php

declare(strict_types=1);

namespace Tests\Ad\ProductSku;

class UpdateOneProductSkuTest extends AbstractProductSkuTest
{
    public function testUpdateOneProductSku()
    {
        $permission = $this->createPermission('UpdateOneProductSku');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);
        $item->save();

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['price']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['price'], $response);

        $data = $item->toArray();
        unset($data['stock']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['stock'], $response);


        $item->dtUpdate = now();
        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $item->dtUpdate = now();
        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->price, $response->json('item.price'));
        self::assertEquals($item->stock, $response->json('item.stock'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(404);
    }
}