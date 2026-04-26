<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesainVideo extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'desain_videos';

    // Kolom yang boleh diisi (mass assignable) sesuai dengan request di Controller
    protected $fillable = [
        'desain_id',
        'video',
        'position_x',
        'position_y',
        'width',
        'height',
    ];

    /**
     * Relasi balik (Inverse) ke model Desain utama
     */
    public function desain()
    {
        return $this->belongsTo(Desain::class);
    }
}