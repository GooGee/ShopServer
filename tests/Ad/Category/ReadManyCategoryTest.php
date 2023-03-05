<?php

declare(strict_types=1);

namespace Tests\Ad\Category;

class ReadManyCategoryTest extends AbstractCategoryTest
{
    public function testReadManyCategory()
    {
        $permission = $this->createPermission('ReadManyCategory');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);
        $item->save();

        $user = $this->createUser();
        $this->actingAs($user);

        $idzz = [$item->id];
        $response = $this->json('GET', $this->makeURI(), compact('idzz'))
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $idzz = [$item->id];
        $response = $this->json('GET', $this->makeURI(), compact('idzz'))
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $idzz = [$item->id];
        $response = $this->json('GET', $this->makeURI(), compact('idzz'))
            ->assertStatus(200);
        $this->seeItemzz(self::structure(), $response);
        $response->assertJsonCount(1, 'itemzz');
    }
}