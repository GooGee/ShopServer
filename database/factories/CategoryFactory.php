<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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

            'name' => $this->faker->unique()->firstName(),

            'parentId' => 1,

            'dtDelete' => null,

            'image' => 'https://shopee.sg/favicon.ico',

        ];
    }
}