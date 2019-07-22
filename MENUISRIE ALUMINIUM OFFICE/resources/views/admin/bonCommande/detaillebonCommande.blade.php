@extends('admin.master')
@section('content-heading')
<div>Les produits de Bon commande {{$boncommandes->id}}
<div  style="float: right; ">
<button class="btn btn-info" data-toggle="modal" data-target="#addproduit"><i class="fas fa-plus-square fa-2x"> Autre produit</i></button>
<a  href="{{URL::to('BonCommande/')}}" class="btn btn-success"
                             ><i class="fas fa-arrow-left fa-2x"></i></a></div></div>


@endsection
@section('page-title')
boncommande {{$boncommandes->id}}
@endsection
@section('maincontent')
@include('admin.bonCommande.modifierLinebonCommande')
@include('admin.bonCommande.supperimerlinebonCommande')
@include('admin.bonCommande.addProduitBoncommande')
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

 <div class="panel-body" >
   
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
             <tr>

                <th>Objectif</th>
                <th>Code de produit</th>
                <th>Produit</th>
                <th>HT</th>
                <th>Quantité</th>
                <th>total</th>
                <th>Date</th>  
                <th>Action</th>             
                                      
            </tr>
        </thead>
         <tbody>


              
                  @foreach($boncommandes->lineboncommandes as $boncommande)
                    <tr class="odd gradeX">  
                        

                        <td> {{$boncommandes->objectif}}</td>
                        <td> {{$boncommande->id_produit}}</td>
                        <td> {{$boncommande->produit->produit}}</td>
                        <td> {{$boncommande->HT}}</td>
                        <td> {{$boncommande->quantite}}</td>
                        <td> {{$boncommande->totale}}</td>
                        <td> {{$boncommandes->created_at}}</td>
                        <td style="min-width:30px;"><div class="text-center"> <button class="btn btn-success" data-id="{{$boncommande->id}}" 
                                 data-id_produit="{{$boncommande->id_produit}}"  data-ht_produit="{{$boncommande->HT}}" data-tva_produit="{{$boncommande->TVA}}" 
                               data-quantite="{{$boncommande->quantite}}"
                               data-toggle="modal" data-target="#modifierLineboncommande"  ><i class="far fa-edit fa-lg"></i></button>
                            <button class="btn btn-warning" data-id="{{$boncommande->id}}" data-toggle="modal" data-target="#supprimer"> <i class="far fa-trash-alt fa-lg"></i></button></div></td>

                        
                       
                       

                       
                        
                                    </tr>
                                
                                  @endforeach  
                                </tbody>
                             </table>
                           
                       


@endsection