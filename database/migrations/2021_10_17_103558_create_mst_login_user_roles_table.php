<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstLoginUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_login_user_roles', function (Blueprint $table) {
            $table->integer('login_user_roles_id', false, true)->primary();
            $table->string('role_name', 50);
            $table->boolean('del_flg')->default(0)->nullable();
            $table->integer('created_user_id')->nullable();
            $table->timestamp('created_datetime')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->timestamp('updated_datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_login_user_roles');
    }
}
