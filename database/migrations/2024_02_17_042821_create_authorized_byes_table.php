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
        Schema::create('authorized_byes', function (Blueprint $table) {
            $table->id();
            $table->string('authorized_by')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
       

        DB::table('authorized_byes')->insert([
            ['authorized_by' => 'Khun Chao','status' => '1'],
            ['authorized_by' => 'Owner','status' => '1'],
            ['authorized_by' => 'Srichai B','status' => '1'],
            ['authorized_by' => 'Mr. Jack','status' => '1'],
            ['authorized_by' => 'HR Department','status' => '1'],
            ['authorized_by' => 'IT Department','status' => '1'],
            ['authorized_by' => 'Construction Department','status' => '1'],
            ['authorized_by' => 'Maintenance Department','status' => '1'],
            ['authorized_by' => 'Marketing Team','status' => '1'],
            ['authorized_by' => 'Security Team','status' => '1'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorized_byes');
    }
};
