<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('user_id');
            $table->string('order_id');
            $table->json('customer_info');
            $table->json('order_detail');
            $table->integer('total_price');
            $table->integer('payment'); //0 - COD, 1 - Đã thanh toán
            $table->integer('status')->default(0); //0 Chờ xác nhận , 1 - Đang vận chuyển , 2 - Hoàn tất
            $table->timestamps();
            $table->softDeletes();
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
};
