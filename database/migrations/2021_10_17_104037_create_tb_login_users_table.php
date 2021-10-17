<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLoginUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_login_users', function (Blueprint $table) {
            $table->id('login_users_id');
            $table->string('login_user_email', 50);
            $table->string('password', 255);
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->unsignedInteger("login_user_roles_id");
            $table->boolean('del_flg')->default(0)->nullable();
            $table->integer('created_user_id')->nullable();
            $table->timestamp('created_datetime')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->timestamp('updated_datetime')->nullable();
            $table->foreign('login_user_roles_id')->references('login_user_roles_id')->on('mst_login_user_roles');
            $table->foreignId('organization_id')->references('id')->on('tb_organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_login_users');
    }
}
