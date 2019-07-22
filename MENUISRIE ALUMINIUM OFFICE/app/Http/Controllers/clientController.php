<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Client;
use App\Devi;
use App\Facture;
use App\Bonlivraison;
use App\Linefacture;
use App\Linebonlivraison;
use App\Linedevi;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class clientController extends Controller
{
    public function Ajouteclient(Request $Request){
       
        if($Request->isMethod('post')){


             $Request->validate([
             'id' => 'unique:clients|min:8|max:8',
             'telephone' => 'numeric',]);
             $newclient=new Client(); 
             $newclient->id=$Request->input('id');
             $newclient->nom=$Request->input('nom');
             $newclient->prenom=$Request->input('prenom');
             $newclient->email=$Request->input('email');
             $newclient->telephone=$Request->input('telephone');
             $newclient->adresse=$Request->input('adresse');
             $newclient->save();
            
             return back()->with('success', 'Nouveau CLient est ajouté');
        } 
    }

    public function update(Request $Request){

     $Request->validate([
             'id' => 'min:8',
             'telephone' => 'numeric',
            ]);
      $client = Client::find($Request->id);
      $client->update($Request->all());


      return back()->with('success', ' client est modifier');
    }

    public function detail(Request $Request){
     $detaille = Client::find($Request->id);
     return view('admin.client.detailleClient',['client'=>$detaille]);
    }

    public function destroy(Request $Request){
       $client = Client::find($Request->id);
       $id_client = $Request->input('id');
       $devi = Devi::where('id_client','LIKE','%'.$id_client.'%');
       $data_devis = DB::select('select id from devis where id_client = :id', ['id' =>$id_client]);
       foreach ($data_devis as $key => $value) {
      
        $one =  $value->id;
       }
       $line_devis = Linedevi::where('id_devi','LIKE','%'.$one.'%');
       $line_devis->delete();
       $facture = Facture::where('id_client','LIKE','%'.$id_client.'%');
       $data_facture = DB::select('select id from factures where id_client = :id', ['id' =>$id_client]);
       foreach ($data_facture as $key => $value) {
      
        $one =  $value->id;
       }
       $line_facture = Linefacture::where('id_facture','LIKE','%'.$one.'%');
       $line_facture->delete();
       $facture->delete();
       $bonlivraison = Bonlivraison::where('id_client','LIKE','%'.$id_client.'%');
       $data_bonlivraison = DB::select('select id from bonlivraisons where id_client = :id', ['id' =>$id_client]);
       foreach ($data_bonlivraison as $key => $value) {
      
        $one =  $value->id;
       }
       $line_bonlivraison = Linebonlivraison::where('id_bonlivraison','LIKE','%'.$one.'%');
       
       $line_bonlivraison->delete();
       $bonlivraison->delete();
       $devi->delete();
       $client->delete();

       return back()->with('success', ' client est supprimer');;
    }

     public function search(Request $request)
    {
        $query = $request->input('query');
         $posts = DB::table('clients')->where('nom','LIKE','%'.$query.'%')
                                      ->orWhere('prenom', 'like', '%'.$query.'%')
                                          ->orWhere('email', 'like', '%'.$query.'%')
                                          ->orWhere('telephone', 'like', '%'.$query.'%')
                                          ->orWhere('adresse', 'like', '%'.$query.'%')->orderBy('id', 'desc')
                                          ->get()->paginate(5);
        return view('admin.client.Client',compact('posts','query'));
    }


}
