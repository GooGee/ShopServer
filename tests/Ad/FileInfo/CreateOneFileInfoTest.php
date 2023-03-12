<?php

declare(strict_types=1);

namespace Tests\Ad\FileInfo;

class CreateOneFileInfoTest extends AbstractFileInfoTest
{
    public function testCreateOneFileInfo()
    {
        $permission = $this->createPermission('CreateOneFileInfo');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['uri']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['uri'], $response);

        $item->uri = config('app.url') . '/blank1x1.png';
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertMatchesRegularExpression('/^image\//', $response->json('item.mime'));
        self::assertEquals($item->uri, $response->json('item.uri'));
    }
}