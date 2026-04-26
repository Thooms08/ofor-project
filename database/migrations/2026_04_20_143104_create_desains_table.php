<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabel Utama Desain
        Schema::create('desains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('aspek_rasio')->default('9-16');
            $table->string('background')->default('#ffffff'); // bisa hex atau path file
            $table->string('voice')->nullable(); // path file audio
            $table->float('voice_pos_x')->default(20);
            $table->float('voice_pos_y')->default(20);
            $table->timestamps();
        });

        // Tabel Relasi: Teks pada Desain
        Schema::create('desain_texts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desain_id')->constrained('desains')->onDelete('cascade');
            $table->text('text');
            $table->string('font');
            $table->string('color');
            $table->float('size')->default(20);
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->float('position_x')->default(0);
            $table->float('position_y')->default(0);
            $table->timestamps();
        });

        // Tabel Relasi: Gambar tambahan pada Desain
        Schema::create('desain_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desain_id')->constrained('desains')->onDelete('cascade');
            $table->string('image'); // path file gambar
            $table->float('position_x')->default(0);
            $table->float('position_y')->default(0);
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desain_images');
        Schema::dropIfExists('desain_texts');
        Schema::dropIfExists('desains');
    }
};