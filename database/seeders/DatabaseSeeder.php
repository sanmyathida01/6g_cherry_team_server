<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $seeds = [
            MstTeamsCategoriesSeeder::class,
            MstLoginUserRolesSeeder::class,
            TbOrganizationsSeeder::class,
            TbLoginUsersSeeder::class,
            TbPostsSeeder::class,
        ];
        $this->call($seeds);
    }
}
