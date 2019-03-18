<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemGroupsTable extends Migration
{
    /**
     * 后台角色组表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_groups', function (Blueprint $table) {
            $table->increments('id')->comment('角色组表');
            $table->string('group_name', 100)->comment('角色组名称');
            $table->string('group_desc', 255)->comment('角色组描述');
            $table->unsignedSmallInteger('admin_id')->comment('管理员ID');
            $table->unsignedSmallInteger('gpid')->default(0)->comment('父级组ID');
            $table->unsignedTinyInteger('status')->comment('角色组状态');
            $table->softDeletes()->comment('软删除标识');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_groups');
    }
}
