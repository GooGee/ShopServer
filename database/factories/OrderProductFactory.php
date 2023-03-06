<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderProduct::class;

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

            'orderId' => OrderFactory::new(),

            'amount' => $this->faker->numberBetween(1, 11),

            'price' => $this->faker->numberBetween(1000, 333000),

            'productSkuId' => ProductSkuFactory::new(),

        ];
    }
}