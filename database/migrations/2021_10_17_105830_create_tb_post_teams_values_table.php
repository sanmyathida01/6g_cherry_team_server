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
            $table->integerIncrements('teams_values_id')->comment('ID');
            $table->unsignedInteger('created_user_id')->nullable()->comment('作成者');
            $table->timestamp('created_datetime')->nullable()->comment('作成日時');
            $table->unsignedInteger('updated_user_id')->nullable()->comment('更新者');
            $table->timestamp('updated_datetime')->nullable()->comment('更新日時');
            $table->foreignId('posts_id')->comment('顧客リストID')->references('posts_id')->on('tb_posts');
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
