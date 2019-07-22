@extends('admin.master')
@section('content-heading')
Détails de Produit {{$produit->id}}
<div  style="float: right; ">
 <button  class="btn btn-info" data-toggle="modal" data-target="#NewLot"><i class="fas fa-plus-square fa-2x"> Nouveau quantite</i></button>
<a  href="{{URL::to('Produit/')}}" class="btn btn-success"
                             ><i class="fas fa-arrow-left fa-2x"></i></a></div>

@endsection
@section('page-title')
Produit {{$produit->id}}
@endsection
@section('maincontent') 
@include('admin.produit.modifierQuantite')
@include('admin.produit.supperimerquantite')
@include('admin.produit.nouveauLot')

 <p>                         
   @if(\Session::has('success'))
  <div class="alert alert-success">
   <h3>{{ \Session::get('success') }} </h3>
  </div>
  @endif
  </p>



<h3 >Produit: {{$produit->produit}}<br></h3>
<h3>Description: {{$produit->description}}<br></h3>
<h3>Prix de achat : {{$produit->prix_achat}}<br></h3>
<h3>Prix de vente : {{$produit->prix_vente}}<br></h3>
<h3>Quantité en stock : {{$produit->lineproduits->sum('quantite')}}<br></h3>
<h3>Famille de produit : {{$produit->famille->famille}}<br></h3>
<h3>Categorie de produit : {{$produit->categorie->categorie}}<br></h3>
<h3>Date de achat : {{$produit->created_at}}<br></h3>
<h3>Code  de fournisseur : {{$produit->fournisseur->id}}<br></h3>
<h3>Fournisseur : {{$produit->fournisseur->nom}} {{$produit->fournisseur->prenom}}<br></h3>
<h3>Courrier électronique de fournisseur : {{$produit->fournisseur->email}}<br></h3>
<h3>Telephone de fournisseur : {{$produit->fournisseur->telephone}}<br></h3>
<h3>Compagnie qui fournit le produit : {{$produit->fournisseur->compagnie}}<br></h3>
<br>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
             <tr>
             	<th>Code line de produit</th>

                <th>Produit</th>
                <th>Quantité</th>
                <th>Date</th>
                <th>Action</th>
                                        
                                      
            </tr>
        </thead>
         <tbody>

                    @foreach($produit->lineproduits as $posts)
                                    
                    <tr class="odd gradeX">        
                        <td> {{$posts->id}}</td>
 
                        <td> {{$produit->produit}}</td>
                        <td> {{$posts->quantite}}</td>
                        <td>{{$posts->created_at}} </td>
                        <td style="min-width: 30px;"><div class="text-center"> <button class="btn btn-success" data-id_line="{{$posts->id}}"     
                        	   data-quantite="{{$posts->quantite}}"
                               data-toggle="modal" data-target="#modifierQuantite"  ><i class="far fa-edit fa-lg"></i></button>
                            <button class="btn btn-warning" data-id="{{$posts->id}}" data-toggle="modal" data-target="#supprimer"> <i class="far fa-trash-alt fa-lg"></i></button></div>
                           </td>
                            
                                  
                    </tr>
                                
                  
                                </tbody>
                                @endforeach
                             </table>
@endsection