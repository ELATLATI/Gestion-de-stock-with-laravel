<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineboncommande extends Model
{
     public function produit(){
      	return $this->belongsTo('App\Produit' , 'id_produit');
    }
}
