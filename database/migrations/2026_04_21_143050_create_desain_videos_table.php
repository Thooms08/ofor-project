<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('desain_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desain_id')->constrained('desains')->onDelete('cascade');
            $table->string('video'); // Path file video
            $table->float('position_x')->default(0);
            $table->float('position_y')->default(0);
            $table->float('width')->default(200);
            $table->float('height')->default(150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desain_videos');
    }
};
