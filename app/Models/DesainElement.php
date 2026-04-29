<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesainElement extends Model
{
    protected $fillable = ['desain_id', 'type', 'color', 'size', 'rotation', 'position_x', 'position_y'];

    public function desain()
    {
        return $this->belongsTo(Desain::class);
    }
}