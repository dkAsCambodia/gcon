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
        Schema::create('bookingtable_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Bookingtable::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Language::class)->constrained()->cascadeOnDelete();
            $table->string('tbl_name')->nullable();
            $table->string('tbl_title')->nullable();
            $table->string('tbl_address')->nullable();
            $table->string('tbl_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookingtable_translations');
    }
};
