<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //    
    protected $fillable = [
        'model','title','content','price','created_at','updated_at'
    ];
}
