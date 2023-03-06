<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

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

            'text' => $this->faker->firstName(),

        ];
    }
}