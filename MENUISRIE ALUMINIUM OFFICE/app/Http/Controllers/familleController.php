<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Famille;
use Validator;

class familleController extends Controller
{
     public function Ajoutefamille(Request $Request){
        
        if($Request->isMethod('post')){

             $Request->validate([
             'id' => 'unique:familles|min:8|max:8',
             ]);
            
             
             $newfamille= new Famille(); 
             $newfamille->id=$Request->input('id');
             $newfamille->famille=$Request->input('famille');
             $newfamille->save();
             return back()->with('success', 'Nouveau famille est ajouté');
        }
       
    }
}
