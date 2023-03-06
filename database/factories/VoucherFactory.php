<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voucher::class;

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

            'type' => 'Percentage',

            'amount' => $this->faker->numberBetween(1, 11),

            'limit' => $this->faker->randomNumber(),

            'code' => $this->faker->firstName(),

            'dtStart' => null,

            'dtEnd' => null,

            'name' => $this->faker->firstName(),

        ];
    }
}