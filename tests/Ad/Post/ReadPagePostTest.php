<?php

declare(strict_types=1);

namespace Tests\Ad\Post;

class ReadPagePostTest extends AbstractPostTest
{
    protected function path(): string
    {
        return "PostPage";
    }

    public function testReadPagePost()
    {
        $permission = $this->createPermission('ReadPagePost');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);
        $item->save();

        $user = $this->createUser();
        $this->actingAs($user);

        $data = [
            'pagination' => [
                'page' => 1,
                'perPage' => 10,
            ],
            'sort' => [
                'field' => 'id',
                'order' => 'desc',
            ],
            'filter' => [],
        ];
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonCount(1, 'page.data');


        $data['filter'] = [];
        $data['filter']['reviewId'] = $item->reviewId;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.reviewId', $item->reviewId);
        self::assertNotNull($response->json('page.data.0.admin'));
        self::assertNull($response->json('page.data.0.user'));

    }
}