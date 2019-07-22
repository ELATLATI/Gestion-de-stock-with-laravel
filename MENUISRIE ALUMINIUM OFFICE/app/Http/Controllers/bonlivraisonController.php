<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bonlivraison;
use App\Linebonlivraison;
use App\Produit;
use App\Client;
use Illuminate\Support;
use Illuminate\Support\Facades\DB;

class bonlivraisonController extends Controller
{
    public function AjoutebonLivraison(Request $Request){
    	if($Request->isMethod('post')){

             $Request->validate([
             'id' => 'unique:bonlivraisons|min:8|max:8',
            
             'quantite'=> 'numeric',
             ]);

            
            $id_produit = $Request->input('id_produit');
            $produits = Produit::find($id_produit);
             
             $newbonlivraison=new Bonlivraison(); 
             $newbonlivraison->id=$Request->input('id');
             $newbonlivraison->id_client=$Request->input('id_client');
             $newbonlivraison->objectif=$Request->input('objectif');

             if($Request->input('TVA')!=null){
                $newbonlivraison->TVA=$Request->input('TVA');
               }
            
             $newbonlivraison->save();


             $newLine_bonlivraison=new Linebonlivraison();
             $newLine_bonlivraison->id_bonlivraison = $Request->input('id');
             $newLine_bonlivraison->id_produit =$Request->input('id_produit');
             $newLine_bonlivraison->quantite =$Request->input('quantite');
             

             if($Request->input('HT')==null){
                $prix=Produit::find($id_produit);
                $newLine_bonlivraison->HT = $prix->prix_vente;
               }
            else{$newLine_bonlivraison->HT=$Request->input('HT');}
             if($Request->input('HT')==null){
             $prix=Produit::find($id_produit);
            $newLine_bonlivraison->totale = $Request->input('quantite')*$prix->prix_vente;}
            else{ $newLine_bonlivraison->totale = $Request->input('quantite')*$Request->input('HT');}
            
             $newLine_bonlivraison->save();
             return back()->with('success', 'Nouveau bonlivraison est ajouté');
        }
    }

    public function AjouteProduit(Request $Request){
         $Request->validate([
            
             'quantite'=> 'numeric',
             ]);
             $newLine_bonlivraison=new Linebonlivraison();
             $newLine_bonlivraison->id_bonlivraison =$Request->input('id_bonlivraison');
             $newLine_bonlivraison->id_produit =$Request->input('id_produit');
             $newLine_bonlivraison->quantite =$Request->input('quantite');
             if($Request->input('HT')==null){
                $prix=Produit::find($Request->input('id_produit'));
                $newLine_bonlivraison->HT = $prix->prix_vente;
               }
            else{$newLine_bonlivraison->HT=$Request->input('HT');}
             if($Request->input('HT')==null){
             $prix=Produit::find($Request->input('id_produit'));
            $newLine_bonlivraison->totale = $Request->input('quantite')*$prix->prix_vente;}
            else{ $newLine_bonlivraison->totale = $Request->input('quantite')*$Request->input('HT');}

            $id = $Request->input('id_bonlivraison');
             $newLine_bonlivraison->save();
             return back()->with('success', 'auter Produit est ajouté');

    }

     public function update(Request $Request){
         $Request->validate([
             'id' => 'min:8|max:8',
           
             ]);
     DB::table('bonlivraisons')
            ->where('id',$Request->id)
            ->update([
                      'objectif' => $Request->objectif,
                      'TVA' => $Request->TVA,
                     
                       ]);

      return back()->with('success', ' le bon de livraison est modifier');
    }

     public function destroy(Request $Request){
       $bonlivraison = Bonlivraison::find($Request->id);
       $id_bonlivraison = $Request->input('id');
       $Linebonlivraison = Linebonlivraison::where('id_bonlivraison','LIKE','%'.$id_bonlivraison.'%');
        $bonlivraison->delete();
        $Linebonlivraison->delete();

       return back()->with('success', ' Bon de livraison est supprimer');;
    }

    public function detaille(Request $Request){
     $produits = Produit::all();
     $detaille = Bonlivraison::find($Request->id);
     return view('admin.bonlivraison.detailBonLivraison',compact('produits'),['bonlivraisons'=>$detaille]);
    }


     public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Bonlivraison::where('id','LIKE','%'.$query.'%')
                                ->orWhere('objectif', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%')
                                 ->orderBy('id', 'desc')->get()->paginate(5);
        $clients = Client::all();
        $produits = Produit::all();
        $bonlivraisons = Bonlivraison::all();
        return view('admin.bonLivraison.BonLivraison',compact('posts','query','bonlivraisons','clients','produits'));
    }
}
