<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom warna di tabel texts
        Schema::table('texts', function (Blueprint $table) {
            $table->string('color')->default('#000000')->after('font');
            $table->float('width')->nullable()->after('size'); // Untuk hasil resize
            $table->float('height')->nullable()->after('width');
        });

        // Tambah posisi X dan Y untuk ikon Voice Note di canvas
        Schema::table('desains', function (Blueprint $table) {
            $table->float('voice_pos_x')->default(0)->after('voice');
            $table->float('voice_pos_y')->default(0)->after('voice_pos_x');
        });
    }

    public function down(): void
    {
        Schema::table('texts', function (Blueprint $table) {
            $table->dropColumn(['color', 'width', 'height']);
        });
        Schema::table('desains', function (Blueprint $table) {
            $table->dropColumn(['voice_pos_x', 'voice_pos_y']);
        });
    }
};