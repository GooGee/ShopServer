<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\RoleHasPermission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RoleHasPermission>
 */
class RoleHasPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoleHasPermission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $index = 0;
        $index += 1;

        return [

            'permission_id' => PermissionFactory::new(),

            'role_id' => RoleFactory::new(),

        ];
    }
}