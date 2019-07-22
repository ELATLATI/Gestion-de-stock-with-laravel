<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['id','nom','prenom','email','telephone','adresse','commande'];


     public function devis(){
      	return $this->hasMany('App\Devi', 'id_client');
      }
    public function factures(){
      	return $this->hasMany('App\Facture', 'id_client');
      }
    public function bonlivraisons(){
      	return $this->hasMany('App\Bonlivraison', 'id_client');
      }
}
