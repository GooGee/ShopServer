<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\CartProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CartProduct>
 */
class CartProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CartProduct::class;

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

            'productSkuId' => ProductSkuFactory::new(),

            'amount' => $this->faker->numberBetween(1, 11),

        ];
    }
}