<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UtilisateurController extends Controller
{
    public function Utilisateur(){
      $Utilisateur = User::where('id','like', Auth::user()->id)->get();
      return view('admin.home.homeContent', ['Utilisateur'=> $Utilisateur] );
    }
}
