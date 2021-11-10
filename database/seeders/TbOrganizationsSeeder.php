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
        ]);
                
        DB::table('tb_organizations')->insertOrIgnore([
            [
                'organization_id' => 1,
                'organization_name' => "Cherry Team",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "Cherry Zaw",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "San Mya Thida",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "Phyo Thinzar Kyaw",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "Ohm Mar Khine",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "Hnin Hnin Yu",
            ],
            [
                'organization_id' => 2,
                'organization_name' => "Yukina Matsushita",
            ],
        ]);
    }
}
