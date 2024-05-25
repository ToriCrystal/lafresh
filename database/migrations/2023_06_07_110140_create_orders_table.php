<?php

use App\Enums\Order\OrderPaymentMethod;
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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_fullname')->nullable();
            $table->string('customer_phone')->nullable();
            $table->tinyInteger('customer_role')->nullable();
            $table->string('shipping_address')->nullable();
            $table->tinyInteger('shipping_method')->nullable();
            $table->tinyInteger('payment_method')->default(OrderPaymentMethod::COD->value);
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->double('sub_total');
            $table->double('discount');
            $table->double('bonus')->nullable();
            $table->double('total');
            $table->tinyInteger('status');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
