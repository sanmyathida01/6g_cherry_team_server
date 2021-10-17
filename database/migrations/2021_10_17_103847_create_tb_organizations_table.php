<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('id');
            $table->string('organization_name', 50);
            $table->boolean('del_flg')->default(0)->nullable();
            $table->integer('created_user_id')->nullable();
            $table->timestamp('created_datetime')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->timestamp('updated_datetime')->nullable();
            $table->foreignId('organization_id')->nullable()->references('id')->on('tb_organizations');
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
