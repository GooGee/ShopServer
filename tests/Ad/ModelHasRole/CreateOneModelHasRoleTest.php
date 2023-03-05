<?php

declare(strict_types=1);

namespace Tests\Ad\ModelHasRole;

class CreateOneModelHasRoleTest extends AbstractModelHasRoleTest
{
    public function testCreateOneModelHasRole()
    {
        $permission = $this->createPermission('CreateOneModelHasRole');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['role_id']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['role_id'], $response);

        $data = $item->toArray();
        unset($data['model_id']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['model_id'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->role_id, $response->json('item.role_id'));
        self::assertEquals($item->model_id, $response->json('item.model_id'));
    }
}