<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_posts')->insertOrIgnore([
            [
                'teams_categories_id' => 1,
                'from_user_id' => 1,
                'to_user_id' => 2,
                'content' => "おはようございます。こんにちは 1!",
            ],
            [
                'teams_categories_id' => 2,
                'from_user_id' => 3,
                'to_user_id' => 2,
                'content' => "おはようございます。こんにちは 2!",
            ],
            [
                'teams_categories_id' => 3,
                'from_user_id' => 3,
                'to_user_id' => 4,
                'content' => "おはようございます。こんにちは 3!",
            ],
            [
                'teams_categories_id' => 4,
                'from_user_id' => 4,
                'to_user_id' => 5,
                'content' => "おはようございます。こんにちは 4!",
            ],
            [
                'teams_categories_id' => 5,
                'from_user_id' => 5,
                'to_user_id' => 6,
                'content' => "おはようございます。こんにちは 5!",
            ],
            [
                'teams_categories_id' => 2,
                'from_user_id' => 6,
                'to_user_id' => 7,
                'content' => "おはようございます。こんにちは 6!",
            ],
            [
                'teams_categories_id' => 3,
                'from_user_id' => 1,
                'to_user_id' => 2,
                'content' => "おはようございます。こんにちは 7!",
            ],
            [
                'teams_categories_id' => 1,
                'from_user_id' => 1,
                'to_user_id' => 2,
                'content' => "おはようございます。こんにちは 8 !",
            ],
            [
                'teams_categories_id' => 3,
                'from_user_id' => 2,
                'to_user_id' => 2,
                'content' => "おはようございます。こんにちは 9!",
            ],
            [
                'teams_categories_id' => 3,
                'from_user_id' => 9,
                'to_user_id' => 4,
                'content' => "おはようございます。こんにちは 10!",
            ],
            [
                'teams_categories_id' => 3,
                'from_user_id' => 10,
                'to_user_id' => 7,
                'content' => "おはようございます。こんにちは 11!",
            ],
            [
                'teams_categories_id' => 5,
                'from_user_id' => 9,
                'to_user_id' => 6,
                'content' => "おはようございます。こんにちは 12!",
            ],
        ]);
    }
}
