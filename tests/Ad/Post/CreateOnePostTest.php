<?php

declare(strict_types=1);

namespace Tests\Ad\Post;

class CreateOnePostTest extends AbstractPostTest
{
    public function testCreateOnePost()
    {
        $permission = $this->createPermission('CreateOnePost');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['reviewId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['reviewId'], $response);

        $data = $item->toArray();
        unset($data['text']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['text'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        $response->assertJsonPath('item.reviewId', $item->reviewId);
        $response->assertJsonPath('item.text', $item->text);
    }
}