<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Produit;
use App\Facture;
use App\Linefacture;
use Illuminate\Support\Facades\DB;

class facturesController extends Controller
{
    public function ajouteFacture(Request $Request){
    	if($Request->isMethod('post')){

              $Request->validate([
             'id' => 'unique:factures|min:8|max:8',
            
             'quantite'=> 'numeric',
             ]);

            
            $id_produit = $Request->input('id_produit');
            $produits = Produit::find($id_produit);
             
             $newfacture=new Facture(); 
             $newfacture->id=$Request->input('id');
             $newfacture->id_client=$Request->input('id_client');
             $newfacture->objectif=$Request->input('objectif');

             if($Request->input('TVA')!=null){
                $newfacture->TVA=$Request->input('TVA');
               }
            
             
             $newfacture->save();


             $newLine_facture=new Linefacture();
             $newLine_facture->id_facture = $Request->input('id');
             $newLine_facture->id_produit =$Request->input('id_produit');
             $newLine_facture->quantite =$Request->input('quantite');
             
             if($Request->input('HT')==null){
                $prix=Produit::find($id_produit);
                $newLine_facture->HT = $prix->prix_vente;
               }
            else{$newLine_facture->HT=$Request->input('HT');}
             if($Request->input('HT')==null){
             $prix=Produit::find($id_produit);
            $newLine_facture->totale = $Request->input('quantite')*$prix->prix_vente;}
            else{ $newLine_facture->totale = $Request->input('quantite')*$Request->input('HT');}
            
             $newLine_facture->save();
             return back()->with('success', 'Nouveau facture est ajouté');
        }
    }

    public function AjouteProduit(Request $Request){
        $Request->validate([
            
             'quantite'=> 'numeric',
             ]);
             $newLine_facture=new Linefacture();
             $newLine_facture->id_facture =$Request->input('id_facture');
             $newLine_facture->id_produit =$Request->input('id_produit');
             $newLine_facture->quantite =$Request->input('quantite');
             if($Request->input('HT')==null){
                $prix=Produit::find($Request->input('id_produit'));
                $newLine_facture->HT = $prix->prix_vente;
               }
            else{$newLine_facture->HT=$Request->input('HT');}
             if($Request->input('HT')==null){
             $prix=Produit::find($Request->input('id_produit'));
            $newLine_facture->totale = $Request->input('quantite')*$prix->prix_vente;}
            else{ $newLine_facture->totale = $Request->input('quantite')*$Request->input('HT');}

            $id = $Request->input('id_facture');
             $newLine_facture->save();
             return back()->with('success', 'auter Produit est ajouté');

    }

     public function update(Request $Request){
        $Request->validate([
             'id' => 'min:8|max:8',
             ]);
     DB::table('factures')
            ->where('id',$Request->id)
            ->update([
                       'objectif' => $Request->objectif,
                       'TVA' => $Request->TVA,
                       ]);

      return back()->with('success', ' la facture est modifier');
    }

    public function destroy(Request $Request){
       $facture = Facture::find($Request->id);
       $id_facture = $Request->input('id');
       $Line_facture = Linefacture::where('id_facture','LIKE','%'.$id_facture.'%');
        $facture->delete();
        $Line_facture->delete();
     

       return back()->with('success', 'la facture est supprimer');;
    }

     public function detail(Request $Request){
     $produits = Produit::all();
     $detaille = Facture::find($Request->id);
     return view('admin.facture.detailleFacture',compact('produits'),['factures'=>$detaille]);
    }


     public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Facture::where('id','LIKE','%'.$query.'%')
                        ->orWhere('objectif', 'like', '%'.$query.'%')
                        ->orWhere('created_at', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')->get()->paginate(5);
        $clients = Client::all();
        $produits = Produit::all();
        $factures = Facture::all();
        return view('admin.facture.Facture',compact('posts','query','factures','clients','produits'));
    }
}
