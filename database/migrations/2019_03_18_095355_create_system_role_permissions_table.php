<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemRolePermissionsTable extends Migration
{
    /**
     * 角色权限关联表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_role_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('role_id')->comment('角色ID');
            $table->unsignedInteger('permissions_id')->comment('权限ID');
            $table->timestamps();

            $table->index('role_id');
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
        Schema::dropIfExists('system_role_permissions');
    }
}
