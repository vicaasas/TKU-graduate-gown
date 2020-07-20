<?php

use App\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('file_id')->unique()->comment('文件編號');
            $table->unsignedBigInteger('stu_id')->comment('使用者 ID');
            $table->foreign('stu_id')->references('id')->on('users');
            $table->bigInteger('cloth')->unsigned()->comment('衣物 ID');
            $table->foreign('cloth')->references('id')->on('cloths');
            $table->bigInteger('accessory')->unsigned()->comment('配件 ID');
            $table->foreign('accessory')->references('id')->on('cloths');
            $table->integer('state')->default(Order::STATE_BORROW)->comment('狀態');
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
        Schema::dropIfExists('orders');
    }
}
