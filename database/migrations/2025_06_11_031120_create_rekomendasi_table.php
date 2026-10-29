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
        Schema::create('rekomendasi', function (Blueprint $table) {
            $table->id(); // ini otomatis jadi id_rekomendasi
            $table->unsignedBigInteger('user_id'); // relasi ke tabel users
            $table->text('rekomendasi_makanan')->nullable(); // bisa pakai JSON/text
            $table->text('rekomendasi_olahraga')->nullable(); // bisa pakai JSON/text
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi');
    }
};
