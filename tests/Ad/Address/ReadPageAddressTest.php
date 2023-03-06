<?php

declare(strict_types=1);

namespace Tests\Ad\Address;

class ReadPageAddressTest extends AbstractAddressTest
{
    protected function path(): string
    {
        return "AddressPage";
    }

    public function testReadPageAddress()
    {
        $permission = $this->createPermission('ReadPageAddress');
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
        $data['filter']['userId'] = $item->userId;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.userId', $item->userId);

        $data['filter'] = [];
        $data['filter']['zip'] = $item->zip;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.zip', $item->zip);

        $data['filter'] = [];
        $data['filter']['name'] = $item->name;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.name', $item->name);

        $data['filter'] = [];
        $data['filter']['phone'] = $item->phone;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.phone', $item->phone);

        $data['filter'] = [];
        $data['filter']['text'] = $item->text;
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonPath('page.data.0.text', $item->text);

    }
}