<?php

namespace Database\Factories;


use App\Models\ScientificActivityItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScientificActivityItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScientificActivityItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'
        ];
    }
}
