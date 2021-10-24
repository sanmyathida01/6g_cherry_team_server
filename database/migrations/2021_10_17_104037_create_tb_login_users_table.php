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
            $table->integerIncrements('login_users_id')->comment('ID');
            $table->string('login_user_email', 50)->comment('ログインユーザーメール');
            $table->string('password', 255)->comment('パスワード');
            $table->string('first_name', 50)->nullable()->comment('ファーストネーム');
            $table->string('last_name', 50)->nullable()->comment('ラストネーム');
            $table->unsignedInteger("login_user_roles_id")->comment('ログインユーザーロールID');
            $table->boolean('del_flg')->default(0)->nullable()->comment('削除フラグ');
            $table->integer('created_user_id')->nullable()->comment('作成者');
            $table->timestamp('created_datetime')->nullable()->comment('作成日時');
            $table->integer('updated_user_id')->nullable()->comment('更新者');
            $table->timestamp('updated_datetime')->nullable()->comment('更新日時');
            $table->foreign('login_user_roles_id')->references('login_user_roles_id')->on('mst_login_user_roles');
            $table->foreignId('organization_id')->comment('オーガニゼーションID')->references('id')->on('tb_organizations');
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
