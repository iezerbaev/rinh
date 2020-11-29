<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(110)->create()->each(function (Project $project) {
            $project->attachTags(Tag::query()->inRandomOrder()->limit(random_int(7, 12))->get());
        });
    }
}
