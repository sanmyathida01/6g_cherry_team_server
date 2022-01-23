<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TbLoginUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = $this->generatePassword();
        DB::table('tb_login_users')->insertOrIgnore([
            [
                'login_user_email' => 'hninhninyu@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "hnin",
                'last_name' => "hnin",
                'login_user_roles_id' => "1",
                'organization_id' => "4",
            ],
            [
                'login_user_email' => 'phyothinzarkyaw@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "phyo",
                'last_name' => "thinzar kyaw",
                'login_user_roles_id' => "1",
                'organization_id' => "4",
            ],
            [
                'login_user_email' => 'ohmmarkhine@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "ohm",
                'last_name' => "mar khine",
                'login_user_roles_id' => "1",
                'organization_id' => "4",
            ],
            [
                'login_user_email' => 'cherryzaw@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "cherry",
                'last_name' => "zaw",
                'login_user_roles_id' => "2",
                'organization_id' => "4",
            ],
            [
                'login_user_email' => 'sanmyathida@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "san mya",
                'last_name' => "thida",
                'login_user_roles_id' => "1",
                'organization_id' => "4",
            ],
            [
                'login_user_email' => 'matsushita@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "yukina",
                'last_name' => "matsushita",
                'login_user_roles_id' => "1",
                'organization_id' => "4",
            ],
            [
                'login_user_email' => 'maythu@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "may",
                'last_name' => "thu",
                'login_user_roles_id' => "1",
                'organization_id' => "5",
            ],
            [
                'login_user_email' => 'zinmar@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "zin",
                'last_name' => "mar",
                'login_user_roles_id' => "1",
                'organization_id' => "5",
            ],
            [
                'login_user_email' => 'theinttheint@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "theint",
                'last_name' => "theint",
                'login_user_roles_id' => "1",
                'organization_id' => "5",
            ],
            [
                'login_user_email' => 'chawsu@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "chaw",
                'last_name' => "su",
                'login_user_roles_id' => "2",
                'organization_id' => "6",
            ],
            [
                'login_user_email' => 'nakamura@seattleconsulting.co.jp',
                'password' => Hash::make($password),
                'first_name' => "shunya",
                'last_name' => "nakamura",
                'login_user_roles_id' => "3",
                'organization_id' => "1",
            ],
        ]);
    }

    /**
     * パスワードの自動生成
     *
     * @param int $len
     * @return $password password
     */
    private function generatePassword($len = 8)
    {
        return substr(str_shuffle(config('constant.PWD_CHAR')), 0, $len);
    }
}
