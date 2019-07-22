<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use Validator;

class categorieController extends Controller
{
     public function Ajoutecategorie(Request $Request){
        
        if($Request->isMethod('post')){

             $Request->validate([
             'id' => 'unique:categories|min:8|max:8',
             ]);
            
             
             $newcategorie= new Categorie(); 
             $newcategorie->id=$Request->input('id');
             $newcategorie->categorie=$Request->input('categorie');
             $newcategorie->save();
             return back()->with('success', 'Nouveau categorie est ajouté');
        }
       
    }
}
