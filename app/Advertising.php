<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    //
    protected $table = 'advertising';

    public static function test(){
        return 'hello from test function yo.';
    }

    public function get_all_byType($type){
        return $type;
    }
}
