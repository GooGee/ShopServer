<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Admin|null find(int $id)
 * @method Admin findOrFail(int $id)
 */
class AdminRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Admin::query();
    }

    static function createSuperAdmin(string $password)
    {
        $user = Admin::query()->make();
        $user->id = Admin::SuperAdminId;
        $user->name = 'Admin';
        $user->email = 'Admin';
        $user->password = bcrypt($password);
        $user->save();
        return $user;
    }

    static function createSystem()
    {
        $user = Admin::query()->make();
        $user->id = Admin::SystemId;
        $user->name = 'System';
        $user->email = 'System';
        $user->password = '';
        $user->save();
        return $user;
    }

    /**
     * @return Admin
     */
    function getSuperAdmin()
    {
        return $this->query()->findOrFail(Admin::SuperAdminId);
    }

    /**
     * @return Admin
     */
    function getSystemAdmin()
    {
        return $this->query()->findOrFail(Admin::SystemId);
    }
}