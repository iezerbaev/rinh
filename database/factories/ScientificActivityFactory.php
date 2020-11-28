<?php

namespace Database\Factories;

use App\Models\ScientificActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScientificActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScientificActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = random_int(0, 1);
        return [
            'name' => $this->faker->text(100),
            'slug' => $this->faker->slug(10),
            'links' => $this->faker->url,
            'place' => $this->faker->randomElement(['Web of Science', 'Scopus']),
            'date' => $this->faker->dateTimeBetween('- 2 years', '- 1 years')->format('Y-m-d'),
            'price' => $type === 1 ? $this->faker->randomFloat(2, 150000, 700000) : null,
            'type' => $type
        ];
    }
}
