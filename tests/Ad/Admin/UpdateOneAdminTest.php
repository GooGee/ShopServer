<?php

declare(strict_types=1);

namespace Tests\Ad\Admin;

class UpdateOneAdminTest extends AbstractAdminTest
{
    public function testUpdateOneAdmin()
    {
        $permission = $this->createPermission('UpdateOneAdmin');
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
        unset($data['password']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['password'], $response);


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
        self::assertNull($response->json('item.dtDelete'));

        $item->dtDelete = now();
        $item->save();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(404);
    }
}