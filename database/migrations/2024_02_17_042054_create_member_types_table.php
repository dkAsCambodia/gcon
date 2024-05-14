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
        Schema::create('member_types', function (Blueprint $table) {
            $table->id();
            $table->string('member_type_name')->nullable();
            $table->string('discount')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        DB::table('member_types')->insert([
            ['member_type_name' => 'Gold','discount' => '10','status' => '1'],
            ['member_type_name' => 'Diamond','discount' => '20','status' => '1'],
            ['member_type_name' => 'Silver','discount' => '30','status' => '1'],
           
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_types');
    }
};
