<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
     public function linefactures(){
      	return $this->hasMany('App\Linefacture','id_facture');
     }

     public function client(){
      	return $this->belongsTo('App\Client' , 'id_client');
    }
}
