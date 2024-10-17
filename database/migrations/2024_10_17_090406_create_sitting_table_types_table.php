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
        Schema::create('sitting_table_types', function (Blueprint $table) {
            $table->id();
            $table->string('sitting_for')->nullable();
            $table->string('sitting_table_name')->nullable();
            $table->string('price')->nullable();
            $table->string('currency_id')->nullable();
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
        Schema::dropIfExists('sitting_table_types');
    }
};
