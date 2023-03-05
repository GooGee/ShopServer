<?php

declare(strict_types=1);

namespace Tests\Ad\Voucher;

class ReadPageVoucherTest extends AbstractVoucherTest
{
    protected function path(): string
    {
        return "VoucherPage";
    }

    public function testReadPageVoucher()
    {
        $permission = $this->createPermission('ReadPageVoucher');
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
        $data['filter']['type'] = 'ss';
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(422);
        $this->seeErrors(['filter.type'], $response);

        $data['filter'] = [];
        $data['filter']['type'] = $item->type;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.type', $item->type);

        $data['filter'] = [];
        $data['filter']['name'] = $item->name;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.name', $item->name);

        $data['filter'] = [];
        $data['filter']['code'] = $item->code;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.code', $item->code);

    }
}