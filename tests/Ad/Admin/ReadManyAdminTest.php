<?php

declare(strict_types=1);

namespace Tests\Ad\Admin;

class ReadManyAdminTest extends AbstractAdminTest
{
    public function testReadManyAdmin()
    {
        $permission = $this->createPermission('ReadManyAdmin');
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

        $admin->givePermissionTo($permission);
        $idzz = [$item->id];
        $response = $this->json('GET', $this->makeURI(), compact('idzz'))
            ->assertStatus(200);
        $this->seeItemzz(self::structure(), $response);
        self::assertEquals(1, count($response->json('itemzz')));
    }
}