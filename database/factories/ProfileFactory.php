<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'ceo_id' => $this->faker->randomDigitNotNull,
        'product_ids' => $this->faker->word,
        'industry_id' => $this->faker->randomDigitNotNull,
        'tax_number' => $this->faker->word,
        'address' => $this->faker->word,
        'dob' => $this->faker->date('Y-m-d H:i:s'),
        'phone' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
