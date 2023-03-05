<?php

declare(strict_types=1);

namespace Tests\Ad\AdminSession;

use App\Models\AdminSession;
use Tests\Ad\Admin\AbstractAdminTest;

class CreateOneAdminSessionTest extends AbstractAdminSessionTest
{
    public function testCreateOneAdminSession()
    {
        $user = $this->createUser();
        $user->makeVisible('password');
        $response = $this->postJson($this->makeURI(0), $user->toArray())
            ->assertStatus(400);
        $response->assertSeeText(trans('auth.failed'));

        $admin = $this->createAdmin();
        $admin->makeVisible('password');
        $data = $admin->toArray();
        $admin->password = bcrypt($admin->password);
        $admin->save();
        $this->assertDatabaseCount(new AdminSession(), 0);
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(200);
        $this->seeItem(AbstractAdminTest::structure(), $response);
        $this->assertDatabaseCount(new AdminSession(), 1);

        auth()->logout();

        $admin->dtDelete = now();
        $admin->save();
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(403);

        $data['name'] = 'aa';
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['name'], $response);

        $data['name'] = 'aaa';
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(400);
        $response->assertSeeText(trans('auth.failed'));

        $data['password'] = 'aa';
        $response = $this->postJson($this->makeURI(0), $data)
            ->assertStatus(422);
        $this->seeErrors(['password'], $response);

    }
}