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
        Schema::create('restaurant_foods', function (Blueprint $table) {
            $table->id();
            $table->string('seller_id')->nullable();
            $table->string('restaurant_id')->nullable();
            $table->string('restaurant_cat_id')->nullable();
            $table->string('food_name')->nullable();
            $table->string('food_img')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->longText('created_by')->nullable();
            $table->string('food_status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_foods');
    }
};
