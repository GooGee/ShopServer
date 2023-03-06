<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

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

            'name' => $this->faker->colorName(),

            'price' => $this->faker->numberBetween(1000, 333000),

            'stock' => $this->faker->numberBetween(0, 111),

            'discount' => 0,

            'image' => 'https://shopee.sg/favicon.ico',

            'imagezz' => ['https://shopee.sg/favicon.ico'],

            'categoryId' => CategoryFactory::new(),

            'aaLiked' => 0,

            'aaSold' => 0,

            'rating' => 0,

            'ratingzz' => [0,0,0,0,0,0],

            'dtPublish' => null,

            'detail' => $this->faker->paragraph(),

            'shopId' => 1,

        ];
    }
}