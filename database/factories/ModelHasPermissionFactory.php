<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\ModelHasPermission;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelHasPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModelHasPermission::class;

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

            'permission_id' => PermissionFactory::new(),

            'model_type' => 'Admin',

            'model_id' => AdminFactory::new(),

        ];
    }
}