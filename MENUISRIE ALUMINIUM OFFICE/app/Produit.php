<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produit extends Model
{
    protected $fillable = ['id','id_famille','id_category','id_fournisseur','produit','description','prix_achat','prix_vente','quantite'];

    public function fournisseur(){
      	return $this->belongsTo('App\Fournisseur' , 'id_fournisseur');
      }
    public function famille(){
      	return $this->belongsTo('App\Famille' , 'id_famille');
      }
    public function categorie(){
      	return $this->belongsTo('App\Categorie' , 'id_category');
      }

     public function lineproduits(){
        return $this->hasMany('App\Lineproduit', 'id_produit');
      }
    
}
