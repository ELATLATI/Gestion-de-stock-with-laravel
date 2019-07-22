<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Famille;
use App\Fournisseur;
use App\Categorie;
use App\Linedevi;
use App\Lineproduit;
use Illuminate\Support\Facades\DB;

class DetailleProduitController extends Controller
{

    public function update(Request $Request){
        $Request->validate([
             'quantite'=> 'numeric',
             ]);
      DB::table('lineproduits')
            ->where('id',$Request->id_line)
            ->update(['quantite' => $Request->quantite]);

      return back()->with('success','Quantiete est modifier') ;
    }
     public function destroy(Request $Request){
      
       $id = $Request->input('id');
       
       $lineproduit = Lineproduit::where('id','LIKE','%'.$id.'%');
       $lineproduit->delete();

       

       return back()->with('success', ' Quantité est supprimer');
    }

}
