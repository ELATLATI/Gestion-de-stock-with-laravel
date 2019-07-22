<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boncommande;
use App\Lineboncommande;
use App\Produit;
use App\Fournisseur;
use Illuminate\Support\Facades\DB;

class boncommandeController extends Controller
{
	  public function ajouteBonCommande(Request $Request){
    	if($Request->isMethod('post')){

            $Request->validate([
             'id' => 'unique:boncommandes|min:8|max:8',
             
             'quantite'=> 'numeric',
             ]);

             
            
            $id_produit = $Request->input('id_produit');
            $produits = Produit::find($id_produit);
             
             $newboncommande=new Boncommande(); 
             $newboncommande->id=$Request->input('id');
             $newboncommande->id_fournisseur=$Request->input('id_fournisseur');
             $newboncommande->objectif=$Request->input('objectif');
              if($Request->input('TVA')!=null){
                $newboncommande->TVA=$Request->input('TVA');
               }
            
             $newboncommande->save();


             $newLine_boncommande=new Lineboncommande();
             $newLine_boncommande->id_boncommande = $Request->input('id');
             $newLine_boncommande->id_produit =$Request->input('id_produit');
             $newLine_boncommande->quantite =$Request->input('quantite');
             if($Request->input('HT')==null){
                $prix=Produit::find($id_produit);
                $newLine_boncommande->HT = $prix->prix_vente;
               }
            else{$newLine_boncommande->HT=$Request->input('HT');}
             if($Request->input('HT')==null){
             $prix=Produit::find($id_produit);
            $newLine_boncommande->totale = $Request->input('quantite')*$prix->prix_vente;}
            else{ $newLine_boncommande->totale = $Request->input('quantite')*$Request->input('HT');}

           
            
             $newLine_boncommande->save();
             return back()->with('success', 'Nouveau boncommande est ajouté');
        }
    }

    public function AjouteProduit(Request $Request){
          $Request->validate([
             
             'quantite'=> 'numeric',
             ]);
    	
             $newLine_boncommande=new Lineboncommande();
             $newLine_boncommande->id_boncommande =$Request->input('id_boncommande');
             $newLine_boncommande->id_produit =$Request->input('id_produit');
             $newLine_boncommande->quantite =$Request->input('quantite');
             if($Request->input('HT')==null){
                $prix=Produit::find($Request->input('id_produit'));
                $newLine_boncommande->HT = $prix->prix_vente;
               }
            else{$newLine_boncommande->HT=$Request->input('HT');}
             if($Request->input('HT')==null){
             $prix=Produit::find($Request->input('id_produit'));
            $newLine_boncommande->totale = $Request->input('quantite')*$prix->prix_vente;}
            else{ $newLine_boncommande->totale = $Request->input('quantite')*$Request->input('HT');}
             $newLine_boncommande->save();
             return back()->with('success', 'auter Produit est ajouté');

    }

     public function update(Request $Request){
    $Request->validate([
             'id' => 'min:8|max:8',
             ]);
     DB::table('boncommandes')
            ->where('id',$Request->id)
            ->update([
                      'objectif'=>$Request->objectif,
                      'TVA'=>$Request->TVA,
                       ]);

      return back()->with('success', ' le bon de commande est modifier');
    }

     public function destroy(Request $Request){
       $boncommande = Boncommande::find($Request->id);
       $id_boncommande = $Request->input('id');
       $Lineboncommande = Lineboncommande::where('id_boncommande','LIKE','%'.$id_boncommande.'%');
        $boncommande->delete();
        $Lineboncommande->delete();

       return back()->with('success', ' Bon de commande est supprimer');;
    }

    public function detail(Request $Request){
     $produits = Produit::all();
     $detaille = Boncommande::find($Request->id);
     return view('admin.bonCommande.detaillebonCommande',compact('produits'),['boncommandes'=>$detaille]);
    }


     public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Boncommande::where('id','LIKE','%'.$query.'%')
                              ->orWhere('objectif', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%')
                                 ->orderBy('id', 'desc')->get()->paginate(5);
        $fournisseurs = Fournisseur::all();
        $produits = Produit::all();
        $boncommandes = Boncommande::all();
        return view('admin.bonCommande.BonCommande',compact('posts','query','boncommandes','fournisseurs','produits'));
    }
}
