<?php

declare(strict_types=1);

namespace Tests\Ad\Category;

class UpdateOneCategoryTest extends AbstractCategoryTest
{
    public function testUpdateOneCategory()
    {
        $permission = $this->createPermission('UpdateOneCategory');
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
        unset($data['parentId']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['parentId'], $response);

        $data = $item->toArray();
        unset($data['name']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $data = $item->toArray();
        unset($data['image']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['image'], $response);


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

        self::assertEquals($item->parentId, $response->json('item.parentId'));
        self::assertEquals($item->name, $response->json('item.name'));
        self::assertEquals($item->image, $response->json('item.image'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(404);
    }
}