<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Admin>
 */
class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

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

            'dtCreate' => $this->faker->dateTime(),

            'dtUpdate' => $this->faker->dateTime(),

            'dtDelete' => null,

            'name' => $this->faker->unique()->firstName(),

            'email' => $this->faker->unique()->safeEmail(),

            'password' => $this->faker->password(8),

            'remember_token' => null,

            'dtSuspend' => null,

        ];
    }
}