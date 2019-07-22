@extends('admin.master')
@section('content-heading')

Liste de Bon de commande
 <button  style="float: right; " class="btn btn-info" data-toggle="modal" data-target="#addboncommande"><i class="fas fa-plus-square fa-2x"> Ajouter</i></button>
 
                          

@endsection
@section('page-title')
Bon Commande
@endsection
@section('maincontent')

@include('admin.bonCommande.ajoutebonCommande')

@include('admin.bonCommande.supperimerboncommande')
@include('admin.bonCommande.modifierboncommande')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <p>                         
   @if(\Session::has('success'))
  <div class="alert alert-success">
   
   <h3>{{ \Session::get('success') }} </h3>
  
  </div>
  @endif
</p>

<form method="GET" action="{{ route('BonCommande') }}">

  <div class="input-group">  
    <input class="form-control" value="{{ isset($query) ? $query : '' }}" name="query" 
                              type="text" placeholder="Rechercher" />
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
                <th>Code Bon commande</th>
                <th>Fournisseur</th>
                <th>Objectif</th>
                <th>produits</th>
                <th>Quantite</th>
                <th>TVA</th>
                <th>Date</th>
                <th>Action</th>
                                        
                                      
            </tr>
        </thead>
         <tbody>



              
                    @foreach($posts as $post)
                                    
                    <tr class="odd gradeX">        
                        <td> {{$post->id}}</td>
                        <td> {{$post->fournisseur->nom}} {{$post->fournisseur->prenom}}</td>
                        <td> {{$post->objectif}}</td>
                        <td> @foreach($post->lineboncommandes as $bon) <li>{{$bon->produit->produit}}</li> @endforeach</td>
                        <td> {{$post->lineboncommandes->sum('quantite')}}</td>
                        <td>{{$post->TVA}}</td>
                        <td> {{$post->created_at}}</td>
                        <td style="min-width: 250px;">
                          <div class="text-center">
                          <a href="{{URL::to('ShowBonCommande/'.$post->id)}}" class="btn btn-default"><i class="fas fa-eye fa-2x"></i>
                          </a>
                          <button class="btn btn-success" data-id="{{$post->id}}" 
                                 data-objectif="{{$post->objectif}}" 
                                 data-tva_boncommande="{{$post->TVA}}"
                               data-toggle="modal" data-target="#modifierboncommande"  ><i class="far fa-edit fa-2x "></i>
                          </button>
                          <a href="{{URL::to('BonCommandePDF/'.$post->id)}}" class="btn btn-danger"><i class="fas fa-file-pdf fa-2x"></i></a>
                           
                           <button class="btn btn-warning" data-id="{{$post->id}}" data-toggle="modal" data-target="#supprimer"> <i class="far fa-trash-alt fa-2x"></i>
                          </button>
                         </div>
                                             
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
