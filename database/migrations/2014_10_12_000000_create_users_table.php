<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('用户id，自增');
            $table->string('name')->comment('用户姓名');
            $table->string('email')->unique()->comment('用户邮箱');
            $table->string('password')->comment('用户登录密码');
            $table->rememberToken()->comment('token干啥使的 还不清楚 rembertoken好像是');
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
        Schema::dropIfExists('users');
    }
}
