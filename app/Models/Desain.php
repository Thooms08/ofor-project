<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desain extends Model
{
    protected $fillable = ['user_id', 'slug', 'aspek_rasio', 'background', 'voice', 'voice_pos_x', 'voice_pos_y'];

    public function texts() {
        return $this->hasMany(DesainText::class);
    }

    public function images() {
        return $this->hasMany(DesainImage::class);
    }

    public function videos() {
    return $this->hasMany(DesainVideo::class);
}
}