<!-- Modal -->
        <div class="modal fade" id="addFacture" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" v-show="!editmode" id="addNewLabel">Ajouter un nouveau Facture</h4>
                   
                </div>
                <form action="Factures/" method="POST" >
                     {{csrf_field()}}
                <div class="modal-body">
                     <div class="form-group">
                        <input  type="text" name="id"  required="id" 
                            placeholder="Code de Facture"
                            class="form-control"  >

                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="Client">Client</label>
                       <select name="id_client" required=""  class="form-control" >
                        <option value="">------</option>
                        @foreach($clients as $liste)
                    <option value="{{$liste->id}}  ">{{$liste->nom}} {{$liste->prenom}}</option>
                        @endforeach
                        </select>

                        <has-error :form="form" field="name"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="text" name="objectif"  
                            placeholder="Objectif de facture"
                            class="form-control">

                        <has-error :form="form" field="name"></has-error>
                    </div>

                     
                    <div class="form-group">
                        <label for="Produit">Produit</label>
                       <select name="id_produit" required="" class="form-control" >
                        <option value="" >------</option>
                        @foreach($produits as $liste)
                        <option value="{{$liste->id}}">{{$liste->produit}}</option>
                        @endforeach
                        </select>

                        <has-error :form="form" field="name"></has-error>
                    </div>

                    
                     <div class="form-group">
                        <input  type="text" name="HT"  
                            placeholder="Montant:HT"
                            class="form-control">

                        <has-error :form="form" field="name"></has-error>
                    </div>
                    
                     <div class="form-group">
                        <input  type="Numero" name="TVA"  
                            placeholder="TVA"
                            class="form-control" >
                        <has-error :form="form" field="Numero"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="text" name="quantite" required="adresse" 
                            placeholder="quantité"
                            class="form-control" >
                        <has-error :form="form" field="text"></has-error>
                    </div>
                     
                    <div class="card-tools">
                    <button  class="btn btn-success">Enregistrer </button>
                    </div>

                </div>
            </form>
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>
    </div>
</div>
