<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_posts', function (Blueprint $table) {
            $table->id('posts_id')->comment('ID');
            $table->integer('team_categories_id')->comment('チームのカテゴリID');
            $table->unsignedInteger('from_user_id')->comment('誰から');
            $table->unsignedInteger('to_user_id')->comment('誰かに');
            $table->string('content')->comment('ポスト内容');
            $table->boolean('del_flg')->default(0)->nullable()->comment('削除フラグ');
            $table->integer('created_user_id')->nullable()->comment('作成者');
            $table->timestamp('created_datetime')->nullable()->comment('作成日時');
            $table->integer('updated_user_id')->nullable()->comment('更新者');
            $table->timestamp('updated_datetime')->nullable()->comment('更新日時');
            $table->foreign('from_user_id')->references('login_user_roles_id')->on('tb_login_users');
            $table->foreign('to_user_id')->references('login_user_roles_id')->on('tb_login_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_posts');
    }
}
