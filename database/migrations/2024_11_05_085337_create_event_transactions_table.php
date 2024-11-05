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
        Schema::create('event_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('GBooking_id')->nullable();
            $table->string('event_id')->nullable();
            $table->longText('table_arr')->nullable();
            $table->string('transaction_id')->nullable();
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
            $table->string('paymentType')->nullable();
            $table->string('future_payment_custId')->nullable();
            $table->string('payment_time')->nullable();
            $table->string('gateway_name')->nullable();
            $table->string('status')->default('pending');
            $table->string('cancel_status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_transactions');
    }
};
