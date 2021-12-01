<?php

namespace Database\Factories;

use App\Models\Ceo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CeoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ceo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'dob' => $this->faker->date('Y-m-d H:i:s'),
        'phone' => $this->faker->word,
        'address' => $this->faker->word,
        'organization_id' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
