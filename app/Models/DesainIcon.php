<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesainIcon extends Model
{
    protected $fillable = ['desain_id', 'icon_name', 'color', 'size', 'rotation', 'position_x', 'position_y'];
}