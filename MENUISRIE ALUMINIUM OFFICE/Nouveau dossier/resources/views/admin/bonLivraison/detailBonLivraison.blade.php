@extends('admin.master')
@section('content-heading')
<div>les produits de bon de livraison {{$bonlivraisons->id}}
<div  style="float: right; ">
 <button  class="btn btn-info" data-toggle="modal" data-target="#addproduit"><i class="fas fa-plus-square fa-2x"> Autre produit</i></button>
<a  href="{{URL::to('bonLivraison/')}}" class="btn btn-success"
                             ><i class="fas fa-arrow-left fa-2x"></i></a></div></div>

@endsection
@section('page-title')
bonlivraison {{$bonlivraisons->id}}
@endsection
@section('maincontent')
@include('admin.bonlivraison.modifierLinebonlivraison')
@include('admin.bonlivraison.supperimerlinebonlivraison')
@include('admin.bonLivraison.addProduitbonLivraison')
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


              
                  @foreach($bonlivraisons->linebonlivraisons as $bonlivraison)
                    <tr class="odd gradeX">  
                        
                        
                        <td> {{$bonlivraison->id_produit}}</td>
                        <td> {{$bonlivraison->produit->produit}}</td>
                        <td> {{$bonlivraison->HT}}</td>
                        <td> {{$bonlivraison->quantite}}</td>
                        <td> {{$bonlivraison->totale}}</td>
                        <td> {{$bonlivraisons->created_at}}</td>
                        <td style="min-width: 30px;"><div class="text-center"> <button class="btn btn-success" data-id="{{$bonlivraison->id}}" 
                                 data-id_produit="{{$bonlivraison->id_produit}}"  data-ht_produit="{{$bonlivraison->HT}}" data-tva_produit="{{$bonlivraison->TVA}}" 
                               data-quantite="{{$bonlivraison->quantite}}"
                               data-toggle="modal" data-target="#modifierLinebonlivraison"  ><i class="far fa-edit fa-lg"></i></button>
                            <button class="btn btn-warning" data-id="{{$bonlivraison->id}}" data-toggle="modal" data-target="#supprimer"> <i class="far fa-trash-alt fa-lg"></i></button></div></td>

                        
                       
                       

                       
                        
                                    </tr>
                                
                                  @endforeach  
                                </tbody>
                             </table>
                           
                       


@endsection