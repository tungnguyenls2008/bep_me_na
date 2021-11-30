<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'phone' => $this->faker->word,
        'address' => $this->faker->word,
        'position_id' => $this->faker->randomDigitNotNull,
        'shift' => $this->faker->randomDigitNotNull,
        'salary' => $this->faker->randomDigitNotNull,
        'unit' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->randomDigitNotNull,
        'grade' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
