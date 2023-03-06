<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\ModelHasRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ModelHasRole>
 */
class ModelHasRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModelHasRole::class;

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

            'role_id' => RoleFactory::new(),

            'model_type' => 'Admin',

            'model_id' => AdminFactory::new(),

        ];
    }
}