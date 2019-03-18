<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemGroupRoleTable extends Migration
{
    /**
     * 角色组与角色关联表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_group_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('group_id')->comment('角色组ID');
            $table->unsignedInteger('role_id')->comment('角色ID');

            $table->timestamps();

            $table->index('group_id');
            $table->index('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_group_role');
    }
}
