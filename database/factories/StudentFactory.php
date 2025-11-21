<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Personal Information
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'student_id' => fake()->unique()->numerify('2025####'),
            'gender' => fake()->randomElement(['Male', 'Female', 'Prefer not to say']),
            'date_of_birth' => fake()->dateTimeBetween('-25 years', '-17 years')->format('Y-m-d'),
            'nationality' => 'Filipino',
            'photo_path' => null,
            
            // Academic & Enrollment Information
            'course' => fake()->randomElement(['BS Information Technology', 'BS Computer Science', 'BS Education']),
            'academic_advisor' => fake()->name(),
            'year_level' => fake()->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
            'academic_status' => fake()->randomElement(['Regular', 'Probationary', 'Leave of Absence']),
            'start_date' => fake()->dateTimeBetween('-4 years', 'now')->format('Y-m-d'),
            'expected_graduation_date' => fake()->dateTimeBetween('now', '+2 years')->format('Y-m-d'),
            
            // Contact Information
            'email' => fake()->randomElement([
                fake()->unique()->firstName() . fake()->unique()->lastName() . '@adzu.edu.ph',
                fake()->unique()->firstName() . fake()->unique()->lastName() . '@gmail.com',
                fake()->unique()->firstName() . fake()->unique()->lastName() . '@yahoo.com'
            ]),
            'phone' => '09' . fake()->numerify('########'),
            'address' => fake()->address(),
            'emergency_contact_name' => fake()->name(),
            'emergency_contact_phone' => '09' . fake()->numerify('########'),
        ];
    }
}
