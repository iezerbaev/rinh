<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = [
            'Дизайн',
            'Программирование',
            'Микробиология',
            'Экономика',
            'Менеджмент',
            'История',
            'Аналитика',
            'Разработка ПО',
            'Финансы',
            'Другое',
        ];

        return [
            'name' => $this->faker->words(3, true),
            'type' => $this->faker->randomElement($categories),
        ];
    }
}
