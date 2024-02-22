<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MjuStudent>
 */
class MjuStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'student_code' => fake()->unique()->regexify('[0-9]{15}'),
            'first_name' => fake('th_TH')->name,
            'last_name' => fake('th-TH')->lastName,
            'first_name_en' => fake()->name(),
            'last_name_en' => fake()->lastName(),
            'major_id' => 1,
            'idcard' =>fake()->unique()->regexify('[0-9]{13}'),
            'birthdate' =>fake()->dateTimeBetween(),
            'gender'=> fake()->randomElement(['M','F','L','G','B','T']),
            'address' => fake()->address(),
            'phone' => fake()->numerify('##########'),
            'email' => fake()->unique()->email()
         ];
    }
}
