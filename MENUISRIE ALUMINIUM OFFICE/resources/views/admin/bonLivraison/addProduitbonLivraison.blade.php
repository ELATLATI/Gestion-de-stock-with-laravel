<!-- Modal -->
        <div class="modal fade" id="addproduit" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" v-show="!editmode" id="addNewLabel">Ajouter un autre produit au Bon de livraison {{$bonlivraisons->id}}</h4>
                   
                </div>
                <form action="" method="POST" >
                     {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="id_bonlivraison" value="{{$bonlivraisons->id}}">
                     

                     
                    <div class="form-group">
                        <label for="Produit">Produit</label>
                       <select name="id_produit" required=""  class="form-control" >
                        <option value="">------</option>
                        @foreach($produits as $liste)
                        <option value="{{$liste->id}} ">{{$liste->produit}}</option>
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
                        <input  type="text" name="quantite" required="quantite" 
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
