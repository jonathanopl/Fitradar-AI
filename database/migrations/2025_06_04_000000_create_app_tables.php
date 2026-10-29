<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        
        // Biarkan bagian lain seperti ini
        Schema::create('makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('kalori');
            $table->integer('protein')->nullable();
            $table->integer('karbohidrat')->nullable();
            $table->string('kategori')->nullable();
            $table->timestamps();
        });

        // dst...
    }

    public function down(): void
    {
        Schema::dropIfExists('rekomendasis');
        Schema::dropIfExists('preferensis');
        Schema::dropIfExists('olahragas');
        Schema::dropIfExists('makanans');
    }
};