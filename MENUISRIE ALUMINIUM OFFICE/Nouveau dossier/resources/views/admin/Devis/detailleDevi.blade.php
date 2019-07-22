@extends('admin.master')
@section('content-heading')
<div>Les produits de devis {{$devis->id}}
<div style="float: right; ">
<button class="btn btn-info" data-toggle="modal" data-target="#addproduit"><i class="fas fa-plus-square fa-2x"> Autre produit</i></button>
<a href="{{URL::to('Devis/')}}" class="btn btn-success"
                             ><i class="fas fa-arrow-left fa-2x"></i></a></div></div>
 


@endsection
@section('page-title')
Devi {{$devis->id}}
@endsection
@section('maincontent')
@include('admin.Devis.modifierLineDevi')
@include('admin.Devis.supperimerlineDevi')
@include('admin.Devis.addProduit')
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
                <th>Total</th>
                <th>Date</th>  
                <th>Action</th>             
                                      
            </tr>
        </thead>
         <tbody>


              
                  @foreach($devis->linedevis as $devi)
                    <tr class="odd gradeX">  
                        
                      
                        <td> {{$devi->id_produit}}</td>
                        <td> {{$devi->produit->produit}}</td>
                        <td> {{$devi->HT}}</td>
                        <td>{{$devi->quantite}}</td>
                        <td> {{$devi->totale}}</td>
                        <td> {{$devis->created_at}}</td>
                        <td style="min-width: 30px;"> <div class="text-center"><button class="btn btn-success" data-id="{{$devi->id}}" 
                                 data-id_produit="{{$devi->id_produit}}"  data-ht_produit="{{$devi->HT}}" 
                               data-quantite="{{$devi->quantite}}"
                               data-toggle="modal" data-target="#modifierLinedevi"  ><i class="far fa-edit fa-lg"></i></button>
                            <button class="btn btn-warning" data-id="{{$devi->id}}" data-toggle="modal" data-target="#supprimer"> <i class="far fa-trash-alt fa-lg"></i></button></div></td>

                        
                       
                       

                       
                        
                                    </tr>
                                
                                  @endforeach  
                                </tbody>
                             </table>
                           
                       


@endsection