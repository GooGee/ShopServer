<?php

declare(strict_types=1);

namespace Tests\Ad\FileInfo;

class ReadPageFileInfoTest extends AbstractFileInfoTest
{
    protected function path(): string
    {
        return "FileInfoPage";
    }

    public function testReadPageFileInfo()
    {
        $permission = $this->createPermission('ReadPageFileInfo');
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
            'filter' => [

            ],
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
    }
}