<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'amount',
        'payment_method',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
