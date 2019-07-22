<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('Famille/',"familleController@Ajoutefamille");
Route::post('Categorie/',"categorieController@Ajoutecategorie");
Route::group(['middleware' => ['revalidate','auth']], function(){
Route::get('/home','HomeController@index')->name('home');
Route::get('/home', 'HomeController@Nombre')->name('home');


//==============================================================================//
//                     Fournisseur Routes 
//==============================================================================//
Route::post('Fournisseur/',"fournisseurController@Ajoutefournisseur");
Route::resource('/fournisseur','fournisseurController');
Route::get('Fournisseur/',"fournisseurController@search");
Route::get("ShowFournisseur/{id}","fournisseurController@detail");
Route::get('searchFournisseur/',"fournisseurController@search2");
Route::get('/live_search/action', 'fournisseurController@action')->name('live_search.action');
Route::get('/Fournisseur','fournisseurController@search')->name('Fournisseur');
//==============================================================================//
//                     Client Routes 
//==============================================================================//
Route::post('Client/',"clientController@Ajouteclient");
Route::resource('/client','clientController');
Route::get('Client/',"clientController@search");
Route::get('/Client','clientController@search')->name('Client');
Route::get("ShowClient/{id}","clientController@detail");

//==============================================================================//
//                     Produit Routes 
//==============================================================================//
Route::post('Produit/',"produitController@Ajouteproduit");
Route::resource('/produit',"produitController");
Route::resource('/quantite',"DetailleProduitController");
Route::get('ShowProduit/{id}',"produitController@detail");
Route::get('Produit/',"produitController@search");
Route::get('/Produit','produitController@search')->name('Produit');
Route::post('ShowProduit/{id}',"produitController@NouveauQuantite");
//Route::post('ShowProduit/{id}',"produitController@updateQuantite");
//==============================================================================//
//                     Devis Routes 
//==============================================================================//
//Route::get('Devis/',"devisController@index");
Route::post('Devi/',"devisController@AjouteDevis");
Route::resource('/Devis','devisController');
Route::post('ShowDevi/{id}',"devisController@AjouteProduit");
Route::get('Devis/',"devisController@search");
Route::get('/Devis','devisController@search')->name('Devis');
Route::get("PDF/{id}","PDFController@devi");
//Route::get("devi/","devisController@imperimer");
Route::get("ShowDevi/{id}","devisController@detail");
Route::resource('/linedevi',"detailedevisController");
//==============================================================================//
//                     Bon de commande Routes 
//==============================================================================//
//Route::get('Devis/',"devisController@index");
Route::post('BonCommandes/',"boncommandeController@AjouteBonCommande");
Route::resource('/BonCommande','boncommandeController');
Route::post('ShowBonCommande/{id}',"boncommandeController@AjouteProduit");
Route::get('BonCommande/',"boncommandeController@search");
Route::get('/BonCommande','boncommandeController@search')->name('BonCommande');
Route::get("BonCommandePDF/{id}","PDFController@BonCommande");
//Route::get("devi/","devisController@imperimer");
Route::get("ShowBonCommande/{id}","boncommandeController@detail");
Route::resource('/lineBonCommande',"detaileBonCommandeController");

//==============================================================================//
//                     Factures Routes 
//==============================================================================//
//Route::get('Devis/',"devisController@index");
Route::post('Factures/',"facturesController@AjouteFacture");
Route::resource('/Facture','facturesController');
Route::post('ShowFacture/{id}',"facturesController@AjouteProduit");
Route::get('Facture/',"facturesController@search");
Route::get('/Facture','facturesController@search')->name('Facture');
Route::get("FacturePDF/{id}","PDFController@Facture");
//Route::get("devi/","devisController@imperimer");
Route::get("ShowFacture/{id}","facturesController@detail");
Route::resource('/LineFacture',"detailFactureController");
//==============================================================================//

//==============================================================================//
//                     Factures Routes 
//==============================================================================//
//Route::get('Devis/',"devisController@index");
Route::post('bonLivraisons/',"bonlivraisonController@AjoutebonLivraison");
Route::resource('/bonLivraison','bonlivraisonController');
Route::post('ShowBonLivraison/{id}',"bonlivraisonController@AjouteProduit");
Route::get('bonLivraison/',"bonlivraisonController@search");
Route::get('/bonLivraison','bonlivraisonController@search')->name('bonLivraison');
Route::get("BonLivraisonPDF/{id}","PDFController@BonLivraison");
//Route::get("devi/","devisController@imperimer");
Route::get("ShowBonLivraison/{id}","bonlivraisonController@detaille");
Route::resource('/LineBonLivraison',"detailbonlivraisonController");
//==============================================================================//
});


