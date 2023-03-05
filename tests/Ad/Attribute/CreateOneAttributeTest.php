<?php

declare(strict_types=1);

namespace Tests\Ad\Attribute;

class CreateOneAttributeTest extends AbstractAttributeTest
{
    public function testCreateOneAttribute()
    {
        $permission = $this->createPermission('CreateOneAttribute');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['categoryId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['categoryId'], $response);

        $data = $item->toArray();
        unset($data['name']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->categoryId, $response->json('item.categoryId'));
        self::assertEquals($item->name, $response->json('item.name'));
    }
}