<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->integer('login_user_roles_id', false, true)->primary()->comment('ID');
            $table->string('role_name', 50)->comment('ロール名');
            $table->boolean('del_flg')->default(0)->nullable()->comment('削除フラグ');
            $table->unsignedInteger('created_user_id')->nullable()->comment('作成者');
            $table->timestamp('created_datetime')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日時');
            $table->unsignedInteger('updated_user_id')->nullable()->comment('更新者');
            $table->timestamp('updated_datetime')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新日時');
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
