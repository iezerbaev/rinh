<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = random_int(1, 2) === 1 ? 'male' : 'female';

        return [
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'firstname' => $this->faker->firstName($gender),
            'lastname' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'gender' => $gender,
            'language' => $this->faker->randomElement(['ru', 'en']),
            'status' => 0,
            'type' => $this->faker->randomElement([0, 1, 2]),
            'birthday_at' => $this->faker->dateTimeBetween('-45 years', '-18 years')->format('Y-m-d'),
            'email_verified_at' => now(),
            'type_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
