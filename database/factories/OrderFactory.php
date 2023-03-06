<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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

            'sum' => 1,

            'dtCancel' => null,

            'dtExpire' => null,

            'dtFulfill' => null,

            'dtPay' => null,

            'dtReceive' => null,

            'dtRefund' => null,

            'dtReturn' => null,

            'status' => 'Placed',

            'statusPayment' => 'Unpaid',

            'addressId' => AddressFactory::new(),

        ];
    }
}