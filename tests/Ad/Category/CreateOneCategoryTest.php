<?php

declare(strict_types=1);

namespace Tests\Ad\Category;

class CreateOneCategoryTest extends AbstractCategoryTest
{
    public function testCreateOneCategory()
    {
        $permission = $this->createPermission('CreateOneCategory');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['name']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $data = $item->toArray();
        unset($data['parentId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['parentId'], $response);

        $data = $item->toArray();
        unset($data['image']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['image'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->name, $response->json('item.name'));
        self::assertEquals($item->parentId, $response->json('item.parentId'));
        self::assertEquals($item->image, $response->json('item.image'));

        // todo unique
//        $response = $this->postJson($this->makeURI(0), $data)
//            ->assertStatus(422);
//        $this->seeErrors(['name'], $response);
    }
}