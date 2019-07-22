@extends('admin.master')
@section('content-heading')
<div class="row">
 <div> 
Liste des Produits 
<div style="float: right; ">                                    
  <button  class="btn btn-info" data-toggle="modal" data-target="#addNew"><i class="fas fa-plus-square fa-2x"> Ajouter</i></button>
   <button  class="btn btn-info" data-toggle="modal" data-target="#NewCategorie"><i class="fas fa-plus-square fa-2x"> Nouveau catégorie</i></button>
   <button  class="btn btn-info" data-toggle="modal" data-target="#NewFamille"><i class="fas fa-plus-square fa-2x"> Nouveau Famille</i></button></div></div>
 
                           
  <p>                         
   @if(\Session::has('success'))
  <div class="alert alert-success">
   <h3>{{ \Session::get('success') }} </h3>
  </div>
  @endif
  </p>

@endsection
@section('page-title')
Produit
@endsection
@section('maincontent')  
@include('admin.produit.ajouteProduit')
@include('admin.produit.modifierProduit')
@include('admin.produit.supprimerProduit')
@include('admin.categorie.categorie')
@include('admin.famille.famille')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="GET" action="{{ route('Produit') }}">

<div class="input-group">
     <input class="form-control" value="{{ isset($query) ? $query : '' }}" 
                         name="query" type="text" placeholder="Rechercher" />
       <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                        </button>
      </span>
</div>
</form>

        

<div class="slider display-table center-text">
        <h1    align="center" class="title display-table-cell "><b> Résultat de recherche {{ $query }} : {{ $posts->count() }}</b></h1>
</div><!-- slider -->
@if($posts->count() > 0)
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
             <tr>
               <th>code produit</th>
                <th>Famille</th>
                <th>Categorie</th>
                <th>Produit</th>
                <th>Description</th>
                <th>Prix achat</th>
                <th>Prix vente</th>
                <th>Quantité</th>
                <th>Action</th>
                                        
                                      
            </tr>
        </thead>
         <tbody>



              
                    @foreach($posts as $post)
                                    
                    <tr class="odd gradeX">        
                        <td> {{$post->id}}</td>
                        <td> {{$post->famille->famille}}</td>
                        <td> {{$post->categorie->categorie}}</td>
                        <td> {{$post->produit}}</td>
                        <td> {{$post->description}}</td>
                        <td> {{$post->prix_achat}}</td>
                        <td> {{$post->prix_vente}}</td>
                        <td> {{$post->lineproduits->sum('quantite')}}</td>
                        <td style="min-width: 250px;"> 
                           <div class="text-center">
                               <a href="{{URL::to('ShowProduit/'.$post->id)}}" class="btn btn-default"><i class="fas fa-eye fa-2x"></i></a>
                               <button class="btn btn-success" data-id="{{$post->id}}" data-id_famille="{{$post->id_famille}}" data-id_category="{{$post->id_category}}" data-id_fournisseur="{{$post->id_fournisseur}}" data-produit="{{$post->produit}}" data-description="{{$post->description}}" data-prix_achat="{{$post->prix_achat}}" data-prix_vente="{{$post->prix_vente}}"       data-quantite="{{$post->quantite}}"
                                data-toggle="modal" data-target="#modifierProduit"  ><i class="far fa-edit fa-2x"></i>
                               </button>
                               <button class="btn btn-warning" data-id="{{$post->id}}" data-toggle="modal" data-target="#supprimerProduit"> <i class="far fa-trash-alt fa-2x"></i></button></div>
                              </td>
                                  
                    </tr>
                                
                   @endforeach
                                </tbody>
                             </table>
@else
<div class="col-2x-12 col-md-12">
       <div class="card h-100">
              <div class="single-post post-style-1">
                   <div class="blog-info">
                       <h4 class="title">
                           <strong>Sorry, No post found :(</strong>
                       </h4>
                   </div><!-- blog-info -->
              </div><!-- single-post -->
       </div><!-- card -->
</div><!-- col-2x-4 col-md-6 -->
@endif  
{!!$posts->render()!!} 
@endsection
