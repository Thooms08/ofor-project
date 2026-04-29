<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('desain_texts', function (Blueprint $table) {
            $table->float('rotation')->default(0)->after('size'); // Tambah kolom rotasi
        });
    }

    public function down()
    {
        Schema::table('desain_texts', function (Blueprint $table) {
            $table->dropColumn('rotation');
        });
    }
};