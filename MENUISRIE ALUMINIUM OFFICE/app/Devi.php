<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devi extends Model
{
     public function linedevis(){
      	return $this->hasMany('App\Linedevi','id_devi');
     }

     public function client(){
      	return $this->belongsTo('App\Client' , 'id_client');
    }
}
