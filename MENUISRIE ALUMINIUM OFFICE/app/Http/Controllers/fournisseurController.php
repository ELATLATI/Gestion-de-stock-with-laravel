<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Fournisseur;
use App\Boncommande;
use App\Produit;
use App\Lineproduit;
use App\Lineboncommande;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;




class fournisseurController extends Controller

{
    public function Ajoutefournisseur(Request $Request){
       
        if($Request->isMethod('post')){


             $Request->validate([
             'id' => 'unique:fournisseurs|min:8|max:8',
             'telephone' => 'numeric',]);
             $newfournisseur=new Fournisseur(); 
             $newfournisseur->id=$Request->input('id');
             $newfournisseur->nom=$Request->input('nom');
             $newfournisseur->prenom=$Request->input('prenom');
             $newfournisseur->email=$Request->input('email');
             $newfournisseur->telephone=$Request->input('telephone');
             $newfournisseur->adresse=$Request->input('adresse');
             $newfournisseur->compagnie=$Request->input('compagnie');
             $newfournisseur->save();
            
             return back()->with('success', 'Nouveau fournisseur est ajouté');
        } 
     
    }

   
    public function update(Request $Request){

     $Request->validate([
             'id' => 'min:8',
             'telephone' => 'numeric',
            ]);
      $fournisseur = Fournisseur::find($Request->id);
      $fournisseur->update($Request->all());


      return back()->with('success', ' fournisseur est modifier');
    }

    public function destroy(Request $Request){
       $id_fournisseur = $Request->input('id');
       $fournisseur = Fournisseur::find($Request->id);
       $boncommande = Boncommande::where('id_fournisseur','LIKE','%'.$id_fournisseur.'%');
       $data = DB::select('select id from boncommandes where id_fournisseur = :id', ['id' =>$id_fournisseur]);
       foreach ($data as $key => $value) {
      
        $one =  $value->id;
       }
        $line = Lineboncommande::where('id_boncommande','LIKE','%'.$one.'%');
       
        $line->delete();
       
       $produit = Produit::where('id_fournisseur','LIKE','%'.$id_fournisseur.'%');
       $data_produit = DB::select('select id from produits where id_fournisseur = :id', ['id' =>$id_fournisseur]);
       foreach ($data_produit as $key => $value) {
      
        $one =  $value->id;
       }
        $line_produit = Lineproduit::where('id_produit','LIKE','%'.$one.'%');
       
       $line_produit->delete();
       $produit->delete();
       $boncommande->delete();
       $fournisseur->delete();

       return back()->with('success', ' fournisseur est supprimer');;
    }

    public function detail(Request $Request){
     $detaille = Fournisseur::find($Request->id);
     return view('admin.fournisseur.detailleFournisseur',['fournisseur'=>$detaille]);
    }



     function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('fournisseurs')
         ->where('id', 'like', '%'.$query.'%')
         ->orWhere('nom', 'like', '%'.$query.'%')
         ->orWhere('prenom', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('fournisseurs')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->nom.'</td>
         <td>'.$row->prenom.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->telephone.'</td>
         <td>'.$row->adresse.'</td>
         <td>'.$row->compagnie.'</td>
         <td> 
                          <a class="btn btn-primary" data-id="'.$row->id.'" data-nom="'.$row->nom.'" data-prenom="'.$row->prenom.'" data-email="'.$row->email.'" data-telephone="'.$row->telephone.'" data-adresse="'.$row->adresse.'" data-compagnie="'.$row->compagnie.'" data-toggle="modal" data-target="#modifier"  >Modifier</a>
                          <a class="btn btn-danger" data-id="'.$row->id.'" data-toggle="modal" data-target="#supprimer"> supprimer</a>

                          

        </tr>
        ';
       }
      }      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }    

     public function search2(){
      return view('admin.fournisseur.searchFournisseur');
     }
      
         public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = DB::table('fournisseurs')->where('nom','LIKE','%'.$query.'%')
                                          ->orWhere('prenom', 'like', '%'.$query.'%')
                                          ->orWhere('email', 'like', '%'.$query.'%')
                                          ->orWhere('telephone', 'like', '%'.$query.'%')
                                          ->orWhere('adresse', 'like', '%'.$query.'%')
                                          ->orWhere('compagnie', 'like', '%'.$query.'%')
                                          ->orWhere('created_at', 'like', '%'.$query.'%')
                                          ->orWhere('id', 'like', '%'.$query.'%')->orderBy('id', 'desc')
                                          ->get()->paginate(5);
        return view('admin.fournisseur.Fournisseur',compact('posts','query'));
    }
   

}
