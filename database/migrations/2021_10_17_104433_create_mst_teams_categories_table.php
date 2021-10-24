<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstTeamsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_teams_categories', function (Blueprint $table) {
            $table->integerIncrements('teams_categories_id')->comment('ID');
            $table->string('teams_categories_name', 50)->comment('チームのカテゴリ名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_teams_categories');
    }
}
