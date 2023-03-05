<?php

declare(strict_types=1);

namespace Tests\Api\Address;

class ReadPageAddressTest extends AbstractAddressTest
{
    protected function path(): string
    {
        return "AddressPage";
    }

    public function testReadPageAddress()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

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

            ],
        ];
        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(401);

        $this->actingAs($user);

        $response = $this->json('GET', $this->makeURI(), $data)
            ->assertStatus(200);
        $this->seePage(self::structure(), $response);
        $response->assertJsonCount(1, 'page.data');
    }
}