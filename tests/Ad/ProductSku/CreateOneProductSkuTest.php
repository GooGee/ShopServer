<?php

declare(strict_types=1);

namespace Tests\Ad\ProductSku;

class CreateOneProductSkuTest extends AbstractProductSkuTest
{
    public function testCreateOneProductSku()
    {
        $permission = $this->createPermission('CreateOneProductSku');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['productId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['productId'], $response);

        $data = $item->toArray();
        unset($data['price']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['price'], $response);

        $data = $item->toArray();
        unset($data['stock']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['stock'], $response);

        $data = $item->toArray();
        unset($data['variationzz']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['variationzz'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->productId, $response->json('item.productId'));
        self::assertEquals($item->price, $response->json('item.price'));
        self::assertEquals($item->stock, $response->json('item.stock'));
        self::assertEquals($item->variationzz, $response->json('item.variationzz'));
    }
}