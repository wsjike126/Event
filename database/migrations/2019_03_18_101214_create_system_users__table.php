<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemUsersTable extends Migration
{
    /**
     * 后台系统用户表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_users_', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('系统用户ID');
            $table->string('name')->comment('用户昵称');
            $table->string('email', 100)->unique()->comment('用户邮箱');
            $table->string('phone', 11)->nullable()->comment('用户手机号');
            $table->string('avatar')->nullable()->comment('用户头像');
            $table->unsignedTinyInteger('status')->default(1)->comment('用户状态:1=正常,2=异常');
            $table->string('motto')->nullable()->comment('座右铭');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('system_users_');
    }
}
