<?php

declare(strict_types=1);

namespace Tests\Ad\Voucher;

class UpdateOneVoucherTest extends AbstractVoucherTest
{
    public function testUpdateOneVoucher()
    {
        $permission = $this->createPermission('UpdateOneVoucher');
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
        unset($data['type']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['type'], $response);

        $data = $item->toArray();
        $data['type'] = 'ss';
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['type'], $response);

        $data = $item->toArray();
        unset($data['amount']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['amount'], $response);

        $data = $item->toArray();
        unset($data['limit']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['limit'], $response);

        $data = $item->toArray();
        unset($data['code']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['code'], $response);

        $data = $item->toArray();
        unset($data['dtStart']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['dtStart'], $response);

        $data = $item->toArray();
        unset($data['dtEnd']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['dtEnd'], $response);

        $data = $item->toArray();
        unset($data['name']);
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);


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

        $response->assertJsonPath('item.type', $item->type);
        $response->assertJsonPath('item.amount', $item->amount);
        $response->assertJsonPath('item.limit', $item->limit);
        $response->assertJsonPath('item.code', $item->code);
        $response->assertJsonPath('item.dtStart', $item->dtStart);
        $response->assertJsonPath('item.dtEnd', $item->dtEnd);
        $response->assertJsonPath('item.name', $item->name);

        $item->dtDelete = now();
        $item->save();
        $response = $this->putJson($this->makeURI($item->id), $data)
            ->assertStatus(404);
    }
}