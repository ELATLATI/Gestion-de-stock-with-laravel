<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
      protected $fillable = ['id','nom','prenom','email','telephone','adresse','compagnie'];

     
        public function produits(){
      	return $this->hasMany('App\Produit', 'id_fournisseur');
      }

      
}
