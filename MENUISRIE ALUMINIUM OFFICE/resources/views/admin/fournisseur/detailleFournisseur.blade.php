@extends('admin.master')
@section('content-heading')
Les produits de fournisseur {{$fournisseur->nom}} {{$fournisseur->prenom}}
<a style="float: right; " href="{{URL::to('Fournisseur/')}}" class="btn btn-success"
                             ><i class="fas fa-arrow-left fa-2x"></i></a>

@endsection
@section('page-title')
Fourniseur
@endsection
@section('maincontent') 
 <div class="panel-body" >
   
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
             <tr>  
                <th>Code produit</th>
                <th>Famille</th>
                <th>Category</th> 
                <th>Produit</th>
                <th>Description</th>
                <th>Prix de vent</th>
                <th>Prix de achat</th>
                <th>Quantité</th>
                <th>Date de achat</th>               
                                      
            </tr>
        </thead>
         <tbody>


              
                  @foreach($fournisseur->produits as $produit)
                    <tr class="odd gradeX">  
                        

                        <td> {{$produit->id}}</td>
                        <td> {{$produit->famille->famille}}</td>
                        <td> {{$produit->id_category}}</td>
                        <td>{{$produit->produit}}</td>
                        <td> {{$produit->description}}</td>
                        <td> {{$produit->prix_vente}}</td>
                        <td> {{$produit->prix_achat}}</td>
                        <td>  @foreach($produit->lineproduits as $produits)<li>{{$produits->quantite}}</li>@endforeach</td>
                        <td> @foreach($produit->lineproduits as $produits)<li>{{$produits->created_at}}</li>@endforeach</td>

                        
                       
                       

                       
                        
                                    </tr>
                                
                                  @endforeach  
                                </tbody>
                             </table>
                           
                       


@endsection