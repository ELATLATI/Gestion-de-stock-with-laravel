@extends('admin.master')
@section('content-heading')
<div class="row">
Liste des fournisseurs 
  
                                               
  <button style="float: right; " class="btn btn-info" data-toggle="modal" data-target="#addNew"><i class="fas fa-plus-square fa-2x"> Ajouter</i></button>

 
                           
   <p>                         
   @if(\Session::has('success'))
  <div class="alert alert-success">
   
   <h3>{{ \Session::get('success') }} </h3>
  
  </div>
  @endif
</p>

@endsection
@section('page-title')
Fournisseur
@endsection
@section('maincontent')  


@include('admin.fournisseur.ajoutefournisseur')
@include('admin.fournisseur.modifierfournisseur')
@include('admin.fournisseur.supprimerfournisseur')



 
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form method="GET" action="{{ route('Fournisseur') }}">

 <div class="input-group">     <input class="form-control" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="Rechercher" />
       <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                     <i class="fa fa-search"></i>
                                </button>
                            </span>
    
          </div>  </form>     

 <div class="slider display-table center-text"> 
        <h1    align="center" class="title display-table-cell ">
      Résultat de recherche {{ $query }} : {{ $posts->count() }}</b></h1>
    </div><!-- slider -->
    @if($posts->count() > 0)
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
             <tr>
                <th>Code fournisseur</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Courrier électronique</th>
                <th>Telephone</th>
                <th>Adresse</th>
                <th>Compagnie</th>
                <th>Action</th>
                                        
                                      
            </tr>
        </thead>
         <tbody>



              
                    @foreach($posts as $post)
                                    
                    <tr class="odd gradeX">        
                        <td> {{$post->id}}</td>
                        <td> {{$post->nom}}</td>
                        <td> {{$post->prenom}}</td>
                        <td> {{$post->email}}</td>
                        <td> {{$post->telephone}}</td>
                        <td> {{$post->adresse}}</td>
                        <td> {{$post->compagnie}}</td>
                        <td style="min-width: 250px;"> 
                           <div class="text-center">
                            <a href="{{URL::to('ShowFournisseur/'.$post->id)}}" class="btn btn-default"><i class="fas fa-eye fa-2x"></i>
                            </a>
                          
                            <button class="btn btn-success" data-id="{{$post->id}}" data-nom="{{$post->nom}}" data-prenom="{{$post->prenom}}" data-email="{{$post->email}}" data-telephone="{{$post->telephone}}" data-adresse="{{$post->adresse}}" data-compagnie="{{$post->compagnie}}" data-toggle="modal" data-target="#modifier"  ><i class="far fa-edit fa-2x" ></i>
                            </button>
                            <button class="btn btn-warning" data-id="{{$post->id}}" data-toggle="modal" data-target="#supprimer"> <i class="far fa-trash-alt fa-2x"></i></button></div>
                            
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
