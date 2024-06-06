<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    protected $fillable = ['title', 'content', 'date', 'time', 'image'];
    
    static public function getRecord(){
       return Event::get();
     }
    
}
