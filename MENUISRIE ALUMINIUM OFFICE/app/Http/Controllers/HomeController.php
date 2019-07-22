<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facture;
use App\Devi;
use App\Bonlivraison;
use App\Boncommande;
use App\Client;
use App\Fournisseur;
use App\Produit;
use App\Lineproduit;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home.homeContent');
    }

     public function Nombre(){
        $nombre = Facture::all();
        $NombreDevis = Devi::all();
        $NombreBonLivraison = Bonlivraison::all();
        $NombreBonCommande = Boncommande::all();
        $NombreClient = Client::all();
        $NombreFournisseur = Fournisseur::all();
        $NombreProduit = Produit::all();
        
        $Utilisateur = User::where('id','like', Auth::user()->id)->get();
        return view('admin.home.homeContent',compact('nombre','NombreDevis','NombreBonLivraison','NombreBonCommande','NombreClient','NombreFournisseur','NombreProduit'),['Utilisateur'=> $Utilisateur]);
    }

}
