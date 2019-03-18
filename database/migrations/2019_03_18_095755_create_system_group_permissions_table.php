<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemGroupPermissionsTable extends Migration
{
    /**
     * 角色组权限关联表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_group_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('group_id')->comment('角色组ID');
            $table->unsignedInteger('permissions_id')->comment('权限');
            $table->timestamps();

            $table->index('group_id');
            $table->index('permissions_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_group_permissions');
    }
}
