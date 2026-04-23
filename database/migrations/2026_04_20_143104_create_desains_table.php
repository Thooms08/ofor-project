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
        // Migration desains
        Schema::create('desains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('aspek_rasio', ['9:16', '16:9']);
            $table->string('background'); // HEX atau path
            $table->string('voice')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Migration images
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desain_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->decimal('size', 8, 2)->default(100);
            $table->integer('position_x')->default(0);
            $table->integer('position_y')->default(0);
            $table->timestamps();
        });

        // Migration texts
        Schema::create('texts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desain_id')->constrained()->onDelete('cascade');
            $table->string('font');
            $table->text('text');
            $table->integer('size')->default(20);
            $table->integer('position_x')->default(0);
            $table->integer('position_y')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desains');
        Schema::dropIfExists('images');
        Schema::dropIfExists('texts');
    }
};
