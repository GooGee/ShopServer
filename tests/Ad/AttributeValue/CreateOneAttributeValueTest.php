<?php

declare(strict_types=1);

namespace Tests\Ad\AttributeValue;

class CreateOneAttributeValueTest extends AbstractAttributeValueTest
{
    public function testCreateOneAttributeValue()
    {
        $permission = $this->createPermission('CreateOneAttributeValue');
        $admin = $this->createAdmin();
        $item = $this->makeItem($admin);

        $user = $this->createUser();
        $this->actingAs($user);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(401);

        $this->actingAs($admin, 'admin');


        $data = $item->toArray();
        unset($data['attributeId']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['attributeId'], $response);

        $data = $item->toArray();
        unset($data['text']);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['text'], $response);

        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);
        $response->assertSeeText($permission->name);

        $admin->givePermissionTo($permission);
        $data = $item->toArray();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(self::structure(), $response);

        self::assertEquals($item->attributeId, $response->json('item.attributeId'));
        self::assertEquals($item->text, $response->json('item.text'));
    }
}