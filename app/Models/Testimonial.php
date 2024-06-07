<?php

namespace App\Models;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'profession',
        'image',
    ];

    static public function getRecord(){
        return Testimonial::get();
     }
}
