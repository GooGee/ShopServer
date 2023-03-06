<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\ProductSku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductSku>
 */
class ProductSkuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductSku::class;

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

            'productId' => ProductFactory::new(),

            'price' => $this->faker->numberBetween(1000, 333000),

            'stock' => $this->faker->numberBetween(0, 111),

            'variationzz' => [],

        ];
    }
}