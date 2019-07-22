<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boncommande extends Model
{
    public function lineboncommandes(){
      	return $this->hasMany('App\Lineboncommande','id_boncommande');
     }

     public function fournisseur(){
      	return $this->belongsTo('App\Fournisseur' , 'id_fournisseur');
    }
}
