<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('username')->unique()->comment('帳號');
            $table->string('password')->comment('密碼');
            $table->string('role')->default(User::ROLE_STUDENT)->comment('身份組');

            $table->string('name')->default('')->comment('學生姓名');
            $table->string('department')->default('')->comment('學制');
            $table->string('class')->default('')->comment('系級');

            $table->longText('base64Img')->comment('管理員圖片');
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
        Schema::dropIfExists('users');
    }
}
