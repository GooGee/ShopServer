<?php

declare(strict_types=1);

namespace Tests\Ad\Chart;

class ReadOneChartTest extends AbstractChartTest
{
    public function testReadOneChart()
    {
        $permission = $this->createPermission('ReadOneChart');
        $admin = $this->createAdmin();

        $user = $this->createUser();
        $this->actingAs($user);

        $response = $this->json('GET', $this->makeURI(0))
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $data = ['length' => 15];
        $response = $this->json('GET', $this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);

        $data = [];
        $response = $this->json('GET', $this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['length'], $response);

        $data = ['length' => 15];
        $response = $this->json('GET', $this->makeURI(0), $data)
            ->assertStatus(200);
        $response->assertJsonPath('item.id', 0);
        self::assertIsArray($response->json('item.orderzz'));
        self::assertIsArray($response->json('item.productzz'));
        self::assertIsArray($response->json('item.userzz'));
        self::assertIsArray($response->json('item.revenuezz'));
    }
}