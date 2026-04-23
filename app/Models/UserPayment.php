<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $fillable = [
        'user_id', 'invoice_number', 'amount', 'payment_method', 'status', 'payment_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}