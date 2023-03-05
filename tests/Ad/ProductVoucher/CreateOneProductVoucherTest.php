<?php

declare(strict_types=1);

namespace Tests\Ad\ProductVoucher;

class CreateOneProductVoucherTest extends AbstractProductVoucherTest
{
    public function testCreateOneProductVoucher()
    {
        $permission = $this->createPermission('CreateOneProductVoucher');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['productId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['productId'], $response);

        $data = $item->toArray();
        unset($data['voucherId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['voucherId'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        $response->assertJsonPath('item.productId', $item->productId);
        $response->assertJsonPath('item.voucherId', $item->voucherId);
    }
}