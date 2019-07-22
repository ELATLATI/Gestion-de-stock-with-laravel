@extends('admin.master')
@section('content-heading')
Tableau de bord
@endsection
@section('page-title')
Tableau de bord
@endsection
@section('maincontent')
 <style>
.panel-facture > .panel-heading {
  color: #333FFF;
  background-color: #92C8DB;
  border-color: #ddd;
}
.panel-devis > .panel-heading {
  color: #DF5B18;
  background-color: #DBAB92;
  border-color: #ddd;
}
.panel-bonlivraison > .panel-heading {
  color: #27D815;
  background-color: #A1E59A;
  border-color: #ddd;
}
.panel-boncommande > .panel-heading {
  color: #D0EC0A;
  background-color: #A2B616;
  border-color: #ddd;
}
.panel-client > .panel-heading {
  color: #D4AB3B;
  background-color: #9A8344;
  border-color: #ddd;
}
.panel-fournisseur > .panel-heading {
  color: #60B698;
  background-color: #1E7A5B;
  border-color: #ddd;
}
.panel-produit > .panel-heading {
  color: #BD777A;
  background-color: #91262B;
  border-color: #ddd;
}


</style>
<!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                             <h4 class="text-center">L'information de Compte</h4>
                        </div>
                        <div class="panel-body">
                           
                            @foreach($Utilisateur as $utilisateur)
                           <div>Code d' utilisateur : {{$utilisateur->id}}</div>
                            <div>NOM                 : {{$utilisateur->name}}</div>
                         <div>  Email               : {{$utilisateur->email}}</div>
                          <div> Date                : {{$utilisateur->created_at}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

<!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-facture">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">

                                    <i class="fas fa-file-invoice fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$nombre->count()}}</div>
                                    <div>NOMBRE DE FACTURES</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('Facture/')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-devis">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-file-invoice fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$NombreDevis->count()}}</div>
                                    <div>NOMBRE DE DEVIS</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('Devis/')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-bonlivraison">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-file-invoice fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$NombreBonLivraison->count()}}</div>
                                    <div>NOMBRE BON LIVRAISON</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('bonLivraison/')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-boncommande">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-file-invoice fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div class="huge">{{$NombreBonCommande->count()}}</div>
                                    <div>NOMBRE BON COMMANDE</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('BonCommande/')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></div>
                  <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-client">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$NombreClient->count()}}</div>
                                    <div class="p-3 mb-2 bg-gradient-light text-dark">NOMBRE DE CLIENT</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('Client/')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-fournisseur">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                	<i class="fas fa-truck fa-5x"></i>
                                    
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$NombreFournisseur->count()}}</div>
                                    <div>NOMBRE DE FOURNISSEUR</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('Fournisseur/')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-produit">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                	<i class="fas fa-store-alt fa-5x"></i>
                                	
                                    
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$NombreProduit->count()}}</div>
                                    <div>NOMBRE DE PRODUIT</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('Produit/')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
@endsection
