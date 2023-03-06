<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\AdminSession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AdminSession>
 */
class AdminSessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminSession::class;

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

        ];
    }
}