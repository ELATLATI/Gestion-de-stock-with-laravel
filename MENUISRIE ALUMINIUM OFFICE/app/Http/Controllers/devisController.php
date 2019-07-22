<?php

namespace App\Http\Controllers;
use App\Client;
use App\Produit;
use App\Devi;
use App\Linedevi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class devisController extends Controller
{

    public function ajouteDevis(Request $Request){
    	if($Request->isMethod('post')){

             $Request->validate([
             'id' => 'unique:devis|min:8|max:8',
             
             'quantite'=> 'numeric',
             ]);
             

            
            $id_produit = $Request->input('id_produit');
            $produits = Produit::find($id_produit);
             
             $newdevi=new Devi(); 
             $newdevi->id=$Request->input('id');
             $newdevi->id_client=$Request->input('id_client');
             $newdevi->objectif=$Request->input('objectif');
            
             if($Request->input('TVA')!=null){
                $newdevi->TVA=$Request->input('TVA');
               }
             $newdevi->save();


             $newLine_devi=new Linedevi();
             $newLine_devi->id_devi = $Request->input('id');
             $newLine_devi->id_produit =$Request->input('id_produit');
             $newLine_devi->quantite =$Request->input('quantite');
             if($Request->input('HT')==null){
                $prix=Produit::find($id_produit);
                $newLine_devi->HT = $prix->prix_vente;
               }
            else{$newLine_devi->HT=$Request->input('HT');}
             if($Request->input('HT')==null){
             $prix=Produit::find($id_produit);
            $newLine_devi->totale = $Request->input('quantite')*$prix->prix_vente;}
            else{ $newLine_devi->totale = $Request->input('quantite')*$Request->input('HT');}
            
             $newLine_devi->save();
             return back()->with('success', 'Nouveau Devi est ajouté');
        }
    }

    public function detail(Request $Request){
     $produits = Produit::all();
     $detaille = Devi::find($Request->id);
     return view('admin.Devis.detailleDevi',compact('produits'),['devis'=>$detaille]);
    }

    public function AjouteProduit(Request $Request){
             $Request->validate([
             
             'quantite'=> 'numeric',
             ]);
        
             $newLine_devi=new Linedevi();
             $newLine_devi->id_devi =$Request->input('id_devi');
             $newLine_devi->id_produit =$Request->input('id_produit');
             $newLine_devi->quantite =$Request->input('quantite');
             if($Request->input('HT')==null){
                $prix=Produit::find($Request->input('id_produit'));
                $newLine_devi->HT = $prix->prix_vente;
               }
            else{$newLine_devi->HT=$Request->input('HT');}
             if($Request->input('HT')==null){
             $prix=Produit::find($Request->input('id_produit'));
            $newLine_devi->totale = $Request->input('quantite')*$prix->prix_vente;}
            else{ $newLine_devi->totale = $Request->input('quantite')*$Request->input('HT');}

            $id = $Request->input('id_devi');
             $newLine_devi->save();
             return back()->with('success', 'auter Produit est ajouté');

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = Devi::where('id','LIKE','%'.$query.'%')
                        ->orWhere('objectif', 'like', '%'.$query.'%')
                        ->orWhere('created_at', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')->get()->paginate(5);
        $clients = Client::all();
        $produits = Produit::all();
        $devis = Devi::all();
        return view('admin.Devis.Devis',compact('posts','query','devis','clients','produits'));
    }

    public function destroy(Request $Request){
       $devi = Devi::find($Request->id);
       $id_devi = $Request->input('id');
       $Linedevi = Linedevi::where('id_devi','LIKE','%'.$id_devi.'%');
        $devi->delete();
        $Linedevi->delete();
     

       return back()->with('success', ' Devi est supprimer');;
    }

    public function update(Request $Request){
         
            $Request->validate([
             'id' => 'min:8|max:8',
             ]);
             
     DB::table('devis')
            ->where('id',$Request->id)
            ->update([
                      'objectif'=>$Request->objectif,
                      'TVA'=>$Request->TVA,
                       ]);

      return back()->with('success', ' Devi est modifier');
    }

}
