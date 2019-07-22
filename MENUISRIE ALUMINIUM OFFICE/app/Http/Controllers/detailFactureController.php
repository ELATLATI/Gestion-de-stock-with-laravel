<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Linefacture;
use Illuminate\Support\Facades\DB;
use App\Produit;

class detailFactureController extends Controller
{
    public function update(Request $Request){
       $Request->validate([
             'quantite'=> 'numeric',
             ]);
        if($Request->HT==null){
          $prix=Produit::find($Request->id_produit);
         
          DB::table('linefactures')
          ->where('id',$Request->id)
          ->update([ 
                      'HT' =>$prix->prix_vente,
                      'quantite'=>$Request->quantite,
                      'totale'=>$Request->quantite*$prix->prix_vente]);}
        else{ DB::table('linefactures')
          ->where('id',$Request->id)
          ->update([ 
               'HT' => $Request->HT ,
                      'quantite'=>$Request->quantite,
                      'totale'=>$Request->quantite*$Request->HT]);}

      return back()->with('success','Quantiete est modifier') ;
    }

     public function destroy(Request $Request){
      
       $id = $Request->input('id');
       
       $linedevi = Linefacture::where('id','LIKE','%'.$id.'%');
       $linedevi->delete();
       return back()->with('success', ' produit est supprimer');
    }
}
