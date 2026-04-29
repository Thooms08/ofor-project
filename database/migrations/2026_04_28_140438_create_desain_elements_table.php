<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('desain_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desain_id')->constrained('desains')->onDelete('cascade');
            $table->string('type'); // Menyimpan nama shape, misal: 'circle', 'blob1'
            $table->string('color')->default('#7e22ce');
            $table->integer('size')->default(100);
            $table->integer('rotation')->default(0);
            $table->float('position_x')->default(0);
            $table->float('position_y')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desain_elements');
    }
};