<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

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

            'userId' => UserFactory::new(),

            'productId' => ProductFactory::new(),

            'text' => $this->faker->firstName(),

            'rating' => $this->faker->numberBetween(1, 5),

            'soi' => $this->faker->randomNumber(),

        ];
    }
}