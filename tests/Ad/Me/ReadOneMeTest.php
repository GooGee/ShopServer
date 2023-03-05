<?php

declare(strict_types=1);

namespace Tests\Ad\Me;

class ReadOneMeTest extends AbstractMeTest
{
    public function testReadOneMe()
    {
        $admin = $this->createAdmin();

        $user = $this->createUser();
        $this->actingAs($user);

        $response = $this->getJson($this->makeURI(0))
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');

        $response = $this->getJson($this->makeURI(0))
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);
        self::assertEquals($admin->id, $response->json('item.id'));
        self::assertNull($response->json('item.dtDelete'));
        self::assertIsArray($response->json('item.permissionzz'));

    }
}