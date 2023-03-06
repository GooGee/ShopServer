<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Trend;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Trend>
 */
class TrendFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trend::class;

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

            'amount' => $this->faker->numberBetween(111, 333),

            'type' => $this->faker->firstName(),

        ];
    }
}