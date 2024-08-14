<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade');
            $table->foreignId('food_id')->constrained('restaurant_foods')->onDelete('cascade');
            $table->foreignId('cart_id')->constrained('restaurant_carts')->onDelete('cascade');
            $table->foreignId('cust_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('ship_addresses')->onDelete('cascade');
            $table->string('order_key')->nullable();
            $table->string('quantity')->nullable();
            $table->string('subAmount')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('TransactionId')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_status')->default('pending');
            $table->longText('response_all')->nullable();
            $table->longText('receipt_url')->nullable();
            $table->string('future_payment_custId')->nullable();
            $table->string('payment_time')->nullable();
            $table->string('gateway_name')->nullable();
            $table->string('order_status')->default('pending');
            $table->string('order_date')->nullable();
            $table->string('deliveryBoyId')->nullable();
            $table->longText('delivery_suggestion')->nullable();
            $table->enum('assign_status', ['pending', 'assigned', 'accepted', 'shipped', 'rejected', 'delivered', 'cancelled'])->default('pending');
            $table->longText('cancel_reason')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_orders');
    }
};
