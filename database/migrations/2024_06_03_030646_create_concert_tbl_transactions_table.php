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
        Schema::create('concert_tbl_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('GBooking_id')->nullable();
            $table->string('cat_id')->nullable();
            $table->string('tableId')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->longText('response_all')->nullable();
            $table->longText('receipt_url')->nullable();
            $table->longText('message')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('no_of_people')->nullable();
            $table->string('preferredSeats')->nullable();
            $table->string('paymentType')->nullable();
            $table->string('concert_booking_date')->nullable();
            $table->string('concert_arrival_time')->nullable();
            $table->string('future_payment_custId')->nullable();
            $table->string('payment_timezone')->nullable();
            $table->string('payment_time')->nullable();
            $table->string('gateway_name')->nullable();
            $table->string('status')->default('pending');
            $table->string('cancelStatus')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concert_tbl_transactions');
    }
};
