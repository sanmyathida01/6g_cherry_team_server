<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPostTeamsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_post_teams_values', function (Blueprint $table) {
            $table->id('teams_values_id');
            $table->integer('created_user_id')->nullable();
            $table->timestamp('created_datetime')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->timestamp('updated_datetime')->nullable();
            $table->foreignId('posts_id')->references('posts_id')->on('tb_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_post_teams_values');
    }
}
