<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Permissions;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permissions::class;

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

            'name' => $this->faker->unique()->name(),

            'guard_name' => 'Admin',

            'dtCreate' => $this->faker->dateTime(),

            'dtUpdate' => $this->faker->dateTime(),

        ];
    }
}