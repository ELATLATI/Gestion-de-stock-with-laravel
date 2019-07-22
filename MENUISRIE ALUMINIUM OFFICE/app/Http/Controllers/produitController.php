<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Produit;
use App\Famille;
use App\Fournisseur;
use App\Categorie;
use App\Linedevi;
use App\Linefacture;
use App\Linebonlivraison;
use App\Lineboncommande;
use App\Lineproduit;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class produitController extends Controller

{

    public function Ajouteproduit(Request $Request){
        
        if($Request->isMethod('post')){

             $Request->validate([
             'id' => 'unique:produits|min:8|max:8',
             'prix_achat'=> 'numeric',
             'prix_vente'=> 'numeric',
             ]);
             

             $newproduit=new Produit(); 
             $newproduit->id=$Request->input('id');
             $newproduit->id_user=Auth::user()->id;
             $newproduit->id_famille=$Request->input('id_famille');
             $newproduit->id_category=$Request->input('id_categorie');
             $newproduit->id_fournisseur=$Request->input('id_fournisseur');
             $newproduit->produit=$Request->input('produit');
             $newproduit->description=$Request->input('description');
             $newproduit->prix_achat=$Request->input('prix_achat');
             $newproduit->prix_vente=$Request->input('prix_vente');
             $newproduit->save();

             $newLineproduit=new Lineproduit();
             $newLineproduit->id_produit=$Request->input('id');
             $newLineproduit->quantite=$Request->input('quantite');
             $newLineproduit->save();

             return back()->with('success', 'Nouveau produit est ajouté');
        }
       
    }


    public function update(Request $Request){
      
       $Request->validate([
             'id' => 'min:8|max:8',
             'prix_achat'=> 'numeric',
             'prix_vente'=> 'numeric',
             ]);
        DB::table('produits')
            ->where('id',$Request->id)
            ->update([
                       'produit' => $Request->produit,
                       'description' => $Request->description,
                       'prix_achat' => $Request->prix_achat,
                       'prix_vente' => $Request->prix_vente,
                       ]);

      return back()->with('success','produit est modifier') ;
    }

    

    public function destroy(Request $Request){
       $produit = Produit::find($Request->id);
       $produit->delete();
       $id_produit = $Request->input('id');
       $Linedevi = Linedevi::where('id_produit','LIKE','%'.$id_produit.'%'); 
       $Linedevi->delete();
       $Linefacture = Linefacture::where('id_produit','LIKE','%'.$id_produit.'%'); 
       $Linefacture->delete();
       $Linebonlivraison = Linebonlivraison::where('id_produit','LIKE','%'.$id_produit.'%'); 
       $Linebonlivraison->delete();
       $Lineboncommande = Lineboncommande::where('id_produit','LIKE','%'.$id_produit.'%'); 
       $Lineboncommande->delete();
       $lineproduit = Lineproduit::where('id_produit','LIKE','%'.$id_produit.'%');
       $lineproduit->delete();

       return back()->with('success', ' produit est supprimer');
    }

   

    public function detail(Request $Request){
     $detaille = Produit::find($Request->id);
     $produit = $detaille;
     $posts = Produit::all();
     return view('admin.produit.detailleProduit',compact('posts'))->with('produit',$detaille);
    }

    public function search(Request $request)

    {
        $query = $request->input('query');
        $posts = Produit::where('id','LIKE','%'.$query.'%')
                          ->orWhere('produit', 'like', '%'.$query.'%')
                          ->orWhere('description', 'like', '%'.$query.'%')
                          ->orWhere('created_at', 'like', '%'.$query.'%')
                           ->orderBy('id', 'desc')
                                          ->get()->paginate(5);
        $familles = Famille::all();
        $fournisseurs = Fournisseur::all();
        $categories = Categorie::all();
         return view('admin.produit.produit',compact('posts','query','familles','fournisseurs','categories'));
       
    }

    

    public function NouveauQuantite(Request $Request){
        $Request->validate([
             'id' => 'unique:lineproduits|min:8|max:8',
             ]);
        $newlineProduit = new Lineproduit();
        $newlineProduit->id_produit = $Request->input('id_produit');
        $newlineProduit->quantite = $Request->input('quantite');
        $newlineProduit->save();
        return back()->with('success', 'Nouveau quantite est ajoute');

    }

}
