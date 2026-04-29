<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesainText extends Model
{
    protected $fillable = ['desain_id', 'text', 'font', 'color', 'size', 'rotation', 'width', 'height', 'position_x', 'position_y'];
}