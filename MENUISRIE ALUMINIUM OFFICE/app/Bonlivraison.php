<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonlivraison extends Model
{
    public function linebonlivraisons(){
      	return $this->hasMany('App\Linebonlivraison','id_bonlivraison');
     }

     public function client(){
      	return $this->belongsTo('App\Client' , 'id_client');
    }
}
