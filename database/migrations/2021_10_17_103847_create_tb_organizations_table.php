<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTbOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_organizations', function (Blueprint $table) {
            $table->id('id')->comment('ID');
            $table->string('organization_name', 50)->comment('オーガニゼーション名');
            $table->boolean('del_flg')->default(0)->nullable()->comment('削除フラグ');
            $table->unsignedInteger('created_user_id')->nullable()->comment('作成者');
            $table->timestamp('created_datetime')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日時');
            $table->unsignedInteger('updated_user_id')->nullable()->comment('更新者');
            $table->timestamp('updated_datetime')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新日時');
            $table->foreignId('organization_id')->comment('オーガニゼーションID')->nullable()->references('id')->on('tb_organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_organizations');
    }
}
