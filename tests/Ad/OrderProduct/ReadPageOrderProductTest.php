<?php

declare(strict_types=1);

namespace Tests\Ad\OrderProduct;

class ReadPageOrderProductTest extends AbstractOrderProductTest
{
    protected function path(): string
    {
        return "OrderProductPage";
    }

    public function testReadPageOrderProduct()
    {
        $permission = $this->createPermission('ReadPageOrderProduct');
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
                'orderId' => $item->orderId,
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
        self::assertNotNull($response->json('page.data.0.productSku'));
        self::assertNotNull($response->json('page.data.0.productSku.product'));
    }
}