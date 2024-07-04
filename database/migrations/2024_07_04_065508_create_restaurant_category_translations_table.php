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
        Schema::create('restaurant_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\RestaurantCategory::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Language::class)->constrained()->cascadeOnDelete();
            $table->string('cat_translation_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_category_translations');
    }
};
