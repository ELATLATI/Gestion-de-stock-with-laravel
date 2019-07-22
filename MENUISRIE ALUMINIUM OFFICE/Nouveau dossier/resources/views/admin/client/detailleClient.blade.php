@extends('admin.master')
@section('content-heading')
Les factures de client {{$client->id}} {{$client->nom}} {{$client->prenom}}
                         
<a  style="float: right; " href="{{URL::to('Client/')}}" class="btn btn-success"
                             ><i class="fas fa-arrow-left fa-2x"></i></a>

@endsection
@section('page-title')
Cleint {{$client->id}}
@endsection
@section('maincontent') 
 <div class="panel-body" >
   
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
             <tr>
                <th>Code de facture</th>
                <th>Objectif</th>
                <th>les produits</th>
                <th>Quantite</th>
                <th>Date </th>               
                                      
            </tr>
        </thead>
         <tbody>


              
                  @foreach($client->factures as $facture)
                    <tr class="odd gradeX">  
                        <td> {{$facture->id}}</td>
                        <td> {{$facture->objectif}}</td>
                        <td> @foreach($facture->linefactures as $line)
                            <li>{{$line->produit->produit}}</li>
                             @endforeach</td>
                        <td> @foreach($facture->linefactures as $line)
                            <li>{{$line->quantite}}</li>
                             @endforeach</td>
                        <td> {{$facture->created_at}}</td>

                        
                   
                        
                                    </tr>
                                
                                  @endforeach  
                                </tbody>
                             </table>
                           
                       


@endsection