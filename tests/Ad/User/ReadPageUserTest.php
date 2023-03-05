<?php

declare(strict_types=1);

namespace Tests\Ad\User;

class ReadPageUserTest extends AbstractUserTest
{
    protected function path(): string
    {
        return "UserPage";
    }

    public function testReadPageUser()
    {
        $permission = $this->createPermission('ReadPageUser');
        $admin = $this->createAdmin();

        $user = $this->createUser();
        $this->actingAs($user);
        $item = $user;

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