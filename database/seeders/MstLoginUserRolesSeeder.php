<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstLoginUserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_login_user_roles')->insertOrIgnore([
            [
                'login_user_roles_id' => 1,
                'role_name' => "一般ユーザー",
            ],
            [
                'login_user_roles_id' => 2,
                'role_name' => "Team Leader",
            ],
            [
                'login_user_roles_id' => 3,
                'role_name' => "Gereral Manager",
            ],
        ]);
    }
}
