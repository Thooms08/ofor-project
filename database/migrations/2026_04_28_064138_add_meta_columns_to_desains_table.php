<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('desains', function (Blueprint $table) {
            $table->string('judul', 80)->nullable(); // Nullable sementara agar tidak error pada data lama, tapi diwajibkan saat save
            $table->text('deskripsi')->nullable();
            $table->string('gambar_preview')->nullable();
        });
    }

    public function down()
    {
        Schema::table('desains', function (Blueprint $table) {
            $table->dropColumn(['judul', 'deskripsi', 'gambar_preview']);
        });
    }
};