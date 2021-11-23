<?php

namespace Database\Factories;

use App\Models\RawMaterialImport;
use Illuminate\Database\Eloquent\Factories\Factory;

class RawMaterialImportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RawMaterialImport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'quantity' => $this->faker->randomDigitNotNull,
        'unit' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->randomDigitNotNull,
        'total' => $this->faker->randomDigitNotNull,
        'user_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
