<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemPermissionsTable extends Migration
{
    /**
     * 后台权限表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_permissions', function (Blueprint $table) {
            $table->increments('id')->comment('权限ID');
            $table->unsignedInteger('pid')->default(0)->comment('父级ID');
            $table->unsignedTinyInteger('type')->default(0)->comment('权限类别:1=菜单节点,2=文件节点');
            $table->string('name_en', 100)->comment('权限英文名称');
            $table->string('name_zh', 100)->comment('权限中文名称');
            $table->unsignedTinyInteger('status')->default(1)->comment('权限状态');
            $table->unsignedSmallInteger('sort')->default(0)->comment('排序权重');
            $table->string('node', 255)->nullable()->comment('权限节点');
            $table->string('icon', 100)->nullable()->comment('权限图标');
            $table->string('module', 255)->nullable()->comment('模块标识');
            $table->string('module_name', 255)->nullable()->comment('模块名称');
            $table->softDeletes()->comment('软删除标识');
            $table->timestamps();

            $table->index('pid')->comment('父级索引');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_permissions');
    }
}
