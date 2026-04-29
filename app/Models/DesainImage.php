<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesainImage extends Model
{
    protected $fillable = ['desain_id', 'image', 'position_x', 'position_y', 'width', 'height', 'rotation'];
}