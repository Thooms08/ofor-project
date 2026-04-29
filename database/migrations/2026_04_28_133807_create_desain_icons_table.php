<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desain_icons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desain_id')->constrained('desains')->cascadeOnDelete();
            $table->string('icon_name');
            $table->string('color')->default('#7e22ce'); // Default ungu
            $table->integer('size')->default(50);
            $table->integer('rotation')->default(0);
            $table->decimal('position_x', 8, 2);
            $table->decimal('position_y', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desain_icons');
    }
};