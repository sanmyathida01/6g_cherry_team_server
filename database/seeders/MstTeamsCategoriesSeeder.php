<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MstTeamsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_teams_categories')->insertOrIgnore([
            [
                'teams_categories_id' => 1,
                'teams_categories_name' => "THANKS",
            ],
            [
                'teams_categories_id' => 2,
                'teams_categories_name' => "ENGINE",
            ],
            [
                'teams_categories_id' => 3,
                'teams_categories_name' => "ALL",
            ],
            [
                'teams_categories_id' => 4,
                'teams_categories_name' => "MASTERPIECE",
            ],
            [
                'teams_categories_id' => 5,
                'teams_categories_name' => "STOCK",
            ],
        ]);
    }
}
