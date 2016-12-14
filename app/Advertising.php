<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    //
    protected $table = 'advertising';

    protected $fillable = [
        'type','is_active','order','link','content','created_at','updated_at'
    ];

    //12/14/16 - Delete if not needed. 
    // public function get_all_byType($type){
    //     return $type;
    // }
}
