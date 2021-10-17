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
            $table->id('posts_id');
            $table->integer('team_categories_id');
            $table->unsignedInteger('from_user_id');
            $table->unsignedInteger('to_user_id');
            $table->string('content', 50);
            $table->boolean('del_flg')->default(0)->nullable();
            $table->integer('created_user_id')->nullable();
            $table->timestamp('created_datetime')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->timestamp('updated_datetime')->nullable();
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
