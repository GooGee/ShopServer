<?php

declare(strict_types=1);

namespace Tests\Ad\AdminSession;

use App\Models\AdminSession;

class DeleteOneAdminSessionTest extends AbstractAdminSessionTest
{
    public function testDeleteOneAdminSession()
    {
        $response = $this->deleteJson($this->makeURI(0))
            ->assertStatus(401);

        $admin = $this->createAdmin();
        $admin->makeVisible('password');
        $data = $admin->toArray();
        $admin->password = bcrypt($admin->password);
        $admin->save();
        $this->assertDatabaseCount(new AdminSession(), 0);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->assertDatabaseCount(new AdminSession(), 1);

        $response = $this->deleteJson($this->makeURI(0))
            ->assertStatus(200);
        $this->assertDatabaseCount(new AdminSession(), 1);
    }
}