<?php

namespace Database\Seeders;

use App\Models\ScientificActivity;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Spatie\Tags\Tag;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create()->each(function (User $user) {
            $user->attachTags(Tag::query()->inRandomOrder()->limit(random_int(7, 12))->get());
            ScientificActivity::factory(random_int(5, 10))->make()->each(function (ScientificActivity $scientificActivity) use ($user) {
                $scientificActivity->user_id = $user->id;
                $scientificActivity->save();
                $scientificActivity->attachTags(Tag::query()->inRandomOrder()->limit(random_int(7, 12))->get());
            });
        });
        $this->createDeveloper();
    }

    private function createDeveloper(): void
    {
        User::create([
            'username' => 'khamsolt',
            'email' => 'khamidov@rinh.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'firstname' => 'Magomed',
            'lastname' => 'Khamidov',
            'phone' => '89993991910',
            'gender' => 'male',
            'language' => 'ru',
            'status' => 0,
            'type' => 0,
            'birthday_at' => Carbon::createFromDate(1994, 9, 1)->format('Y-m-d'),
            'email_verified_at' => now(),
            'type_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
