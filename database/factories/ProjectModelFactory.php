<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\ProjectModel;
class ProjectModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName,
            'department' => $this->faker->text,
            'stage' => $this->faker->state,
            'description' => $this->faker->text,
            'pdf_file' => $this->faker->url,
            'doc_file' => $this->faker->url,
            'commercialization' => $this->faker->text
        ];
    }
}
