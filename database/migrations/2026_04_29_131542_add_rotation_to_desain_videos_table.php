<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('desain_videos', function (Blueprint $table) {
            $table->float('rotation')->default(0)->after('height'); // Kolom rotasi video
        });
    }

    public function down()
    {
        Schema::table('desain_videos', function (Blueprint $table) {
            $table->dropColumn('rotation');
        });
    }
};