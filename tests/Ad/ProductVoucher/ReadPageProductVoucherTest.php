<?php

declare(strict_types=1);

namespace Tests\Ad\ProductVoucher;

class ReadPageProductVoucherTest extends AbstractProductVoucherTest
{
    protected function path(): string
    {
        return "ProductVoucherPage";
    }

    public function testReadPageProductVoucher()
    {
        $permission = $this->createPermission('ReadPageProductVoucher');
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
        $data['filter']['productId'] = $item->productId;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.productId', $item->productId);

        $data['filter'] = [];
        $data['filter']['voucherId'] = $item->voucherId;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.voucherId', $item->voucherId);

    }
}