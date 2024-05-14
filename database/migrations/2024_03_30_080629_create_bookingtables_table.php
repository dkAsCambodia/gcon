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
        Schema::create('bookingtables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('GBooking_id')->constrained('tbl_gbookings');
            $table->foreignId('cat_id')->constrained('table_categories');
            $table->string('tbl_img')->nullable();
            $table->string('tbl_img_url')->nullable();
            $table->string('tbl_price')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('discount')->nullable();
            $table->integer('orderby')->nullable();
            $table->boolean('tbl_status')->default(true);
            $table->boolean('deleteStatus')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookingtables');
    }
};
