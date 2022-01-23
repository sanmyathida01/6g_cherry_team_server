<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbOrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_organizations')->insertOrIgnore([
            [
                'organization_name' => "tech_6g",
            ],
            [
                'organization_name' => "tech_5g",
            ],
            [
                'organization_name' => "tech_4g",
            ],
        ]);

        DB::table('tb_organizations')->insertOrIgnore([
            [
                'organization_id' => 1,
                'organization_name' => "Cherry Team",
            ],
            [
                'organization_id' => 1,
                'organization_name' => "Moh Moh Team",
            ],
            [
                'organization_id' => 1,
                'organization_name' => "Chaw Su Team",
            ],
            [
                'organization_id' => 1,
                'organization_name' => "Htet Htet Team",
            ],
            [
                'organization_id' => 1,
                'organization_name' => "Thae Nu Team",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "Team 1",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "Team 2",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "Team 3",
            ],
            [
                'organization_id' => 3,
                'organization_name' => "Team 1",
            ],
            [
                'organization_id' => 3,
                'organization_name' => "Team 2",
            ],
            [
                'organization_id' => 3,
                'organization_name' => "Team 3",
            ],
            [
                'organization_id' => 3,
                'organization_name' => "Team 4",
            ],
        ]);
    }
}
