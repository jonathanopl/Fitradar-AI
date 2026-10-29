<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekomendasi_makanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('makanan');
            $table->text('deskripsi')->nullable();

            $table->float('kalori')->default(0);
            $table->float('protein')->default(0);
            $table->float('karbohidrat')->default(0);
            $table->float('serat')->default(0);
            $table->float('lemak')->default(0);

            $table->enum('waktu_makan', ['sarapan', 'siang', 'malam']);
            $table->date('tanggal');

            $table->timestamps();

            // Foreign key ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_makanans');
    }
};
