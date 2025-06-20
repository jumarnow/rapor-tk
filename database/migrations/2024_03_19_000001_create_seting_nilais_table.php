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
        Schema::create('seting_nilais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seting_nilais');
    }
}; 