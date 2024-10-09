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
        Schema::create('car_banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('GBooking_id')->constrained('tbl_gbookings');
            $table->string('banner_img')->nullable();
            $table->string('title')->nullable();
            $table->string('desc')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_banners');
    }
};
