@extends('admin.master')
@section('content-heading')
<div>
Les produits de la facture {{$factures->id}}
<div style="float: right; "><button  class="btn btn-info" data-toggle="modal" data-target="#addProduit"><i class="fas fa-plus-square fa-2x"> Autre produit</i></button>
<a  href="{{URL::to('Facture/')}}" class="btn btn-success"
                             ><i class="fas fa-arrow-left fa-2x"></i></a></div></div>

@endsection
@section('page-title')
facture {{$factures->id}}
@endsection
@section('maincontent')
@include('admin.facture.modifierLineFacture')
@include('admin.facture.supperimerLineFacture')
@include('admin.facture.addProduit')
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
             
                <th>Code produit</th>
                <th>Produit</th>
       
                <th>HT</th>
                <th>Quantité</th>
                <th>total</th>
                <th>Date</th>  
                <th>Action</th>             
                                      
            </tr>
        </thead>
         <tbody>


              
                  @foreach($factures->linefactures as $facture)
                    <tr class="odd gradeX">  
                        
                        <td> {{$facture->id_produit}}</td>
                        <td> {{$facture->produit->produit}}</td>
  
                        <td> {{$facture->HT}}</td>
                        <td>{{$facture->quantite}}</td>
                        <td> {{$facture->totale}}</td>
                        <td> {{$factures->created_at}}</td>
                        <td style="min-width: 30px;"><div class="text-center"> <button class="btn btn-success" data-id="{{$facture->id}}" 
                                 data-id_produit="{{$facture->id_produit}}"  data-ht_produit="{{$facture->HT}}" data-tva_produit="{{$facture->TVA}}" 
                               data-quantite="{{$facture->quantite}}"
                               data-toggle="modal" data-target="#modifierLineFacture"  ><i class="far fa-edit fa-lg"></i></button>
                            <button class="btn btn-warning" data-id="{{$facture->id}}" data-toggle="modal" data-target="#supprimer"> <i class="far fa-trash-alt fa-lg"></i></button></div></td>

                                    </tr>
                                
                                  @endforeach  
                                </tbody>
                             </table>
                           
                       


@endsection