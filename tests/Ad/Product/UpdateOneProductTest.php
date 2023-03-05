<?php

declare(strict_types=1);

namespace Tests\Ad\Product;

use App\Repository\ProductRepository;

class UpdateOneProductTest extends AbstractProductTest
{
    public function testUpdateOneProduct()
    {
        $permission = $this->createPermission('UpdateOneProduct');
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
        unset($data['name']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

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

        $data = $item->toArray();
        unset($data['image']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['image'], $response);

        $data = $item->toArray();
        unset($data['imagezz']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['imagezz'], $response);

        $data = $item->toArray();
        unset($data['categoryId']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['categoryId'], $response);

        $data = $item->toArray();
        unset($data['discount']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['discount'], $response);

        $data = $item->toArray();
        unset($data['detail']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['detail'], $response);


        $item->dtUpdate = now();
        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $permission = $this->createPermission('CreateOneProduct');
        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $item= (new ProductRepository)->findOrFail($response->json('item.id'));
        $item->name = 'name';
        $data = $item->toArray();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->name, $response->json('item.name'));
        self::assertEquals($item->price, $response->json('item.price'));
        self::assertEquals($item->stock, $response->json('item.stock'));
        self::assertEquals($item->image, $response->json('item.image'));
        self::assertEquals($item->imagezz, $response->json('item.imagezz'));
        self::assertEquals($item->categoryId, $response->json('item.categoryId'));
        self::assertEquals($item->discount, $response->json('item.discount'));
        self::assertEquals($item->detail, $response->json('item.detail'));

    }
}