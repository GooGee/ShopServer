<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

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

            'countryId' => CountryFactory::new(),

            'userId' => UserFactory::new(),

            'zip' => $this->faker->numberBetween(111),

            'name' => $this->faker->firstName(),

            'phone' => $this->faker->phoneNumber(),

            'text' => $this->faker->address(),

        ];
    }
}