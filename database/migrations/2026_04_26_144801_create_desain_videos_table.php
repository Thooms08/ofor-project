<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('desain_videos', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel desains (cascade agar jika desain dihapus, videonya ikut terhapus di DB)
            $table->foreignId('desain_id')->constrained('desains')->onDelete('cascade');
            
            $table->string('video'); // Path ke file video
            $table->decimal('position_x', 8, 2)->default(0); // Koordinat X
            $table->decimal('position_y', 8, 2)->default(0); // Koordinat Y
            $table->decimal('width', 8, 2)->default(200);    // Lebar video
            $table->decimal('height', 8, 2)->default(150);   // Tinggi video
            
            $table->timestamps();
        });
    }

    /**
     * Kembalikan (rollback) migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('desain_videos');
    }
};