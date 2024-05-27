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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('sellerId')->nullable();
            $table->string('GBookingId')->nullable();
            $table->string('restaurantName')->nullable();
            $table->string('imgRestaurant')->nullable();
            $table->string('openTime')->nullable();
            $table->string('closedtime')->nullable();
            $table->string('openingDay')->nullable();
            $table->string('closingday')->nullable();
            $table->longText('Discount')->nullable();
            $table->longText('lat')->nullable();
            $table->longText('long')->nullable();
            $table->longText('address')->nullable();
            $table->string('openStatus')->default(true);
            $table->string('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
