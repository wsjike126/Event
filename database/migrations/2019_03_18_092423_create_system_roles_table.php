<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemRolesTable extends Migration
{
    /**
     * 后台角色表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_roles', function (Blueprint $table) {
            $table->increments('id')->comment('角色ID');
            $table->unsignedSmallInteger('rpid')->default(0)->comment('角色父级ID');
            $table->string('role_name', 50)->comment('角色名称');
            $table->string('role_desc', 255)->comment('角色描述');
            $table->unsignedTinyInteger('status')->comment('角色状态');
            $table->unsignedSmallInteger('admin_id')->comment('管理员ID');
            $table->softDeletes()->comment('软删除标识');
            $table->timestamps();

            $table->index('rpid')->comment('角色索引');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_roles');
    }
}
