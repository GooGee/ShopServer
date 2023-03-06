<?php

declare(strict_types=1);

namespace Database\Factories;


use App\Models\FileInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FileInfo>
 */
class FileInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FileInfo::class;

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

            'location' => $this->faker->firstName(),

            'uri' => 'https://shopee.sg/favicon.ico',

            'mime' => $this->faker->mimeType(),

            'width' => 0,

            'height' => 0,

        ];
    }
}