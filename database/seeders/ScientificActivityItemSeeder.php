<?php

namespace Database\Seeders;

use App\Models\ScientificActivityItem;
use Illuminate\Database\Seeder;

class ScientificActivityItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vo"id"
     */
    public function run()
    {
        $d = app_path('../resources/js/Data/Science/data.json');
        $data = file_get_contents($d);
        $json = json_decode($data, true);
        foreach ($json['data'] as $main) {
            $activity = new ScientificActivityItem();
            $activity->type = 0;
            $this->pull($main, $activity);
        }
    }

    public function pull(array $data, ScientificActivityItem $main)
    {
        foreach ($data as $item) {
            $activity = new ScientificActivityItem();
            if (isset($item['properties']) && count($item['properties']) > 0) {
                $this->pull($item['properties']);
            }
        }
    }
}
