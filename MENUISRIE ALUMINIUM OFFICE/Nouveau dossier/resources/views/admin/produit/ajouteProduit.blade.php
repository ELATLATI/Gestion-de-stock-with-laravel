<!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" v-show="!editmode" id="addNewLabel">Ajouter un nouveau Produit</h4>
                   
                </div>
                <form action="Produit/" method="POST" >
                     {{csrf_field()}}
                <div class="modal-body">
                     <div class="form-group">
                        <input  type="text" name="id"  required="id" 
                            placeholder="Code de produit"
                            class="form-control"  >

                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="nom">Famille</label>
                       <select name="id_famille" required="" class="form-control" >
                        <option value="" >------</option>
                        @foreach($familles as $liste)
                        <option value="{{$liste->id}}">{{$liste->famille}} </option>
                        @endforeach
                        </select>

                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="nom">Categorie</label>
                       <select name="id_categorie"  required="" class="form-control" >
                        <option value="" >------</option>
                        @foreach($categories as $liste)
                        <option value="{{$liste->id}} ">{{$liste->categorie}}</option>
                        @endforeach
                        </select>

                        <has-error :form="form" field="name"></has-error>
                    </div>

                    
                   <div class="form-group">
                        <label for="nom">Fournisseur</label>
                       <select name="id_fournisseur"  required="" class="form-control" >
                        <option value="">------</option>
                        @foreach($fournisseurs as $liste)
                        <option value="{{$liste->id}} ">{{$liste->id}} {{$liste->nom}} {{$liste->prenom}}</option>
                        @endforeach
                        </select>

                        <has-error :form="form" field="name"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="text" name="produit" required="nom" 
                            placeholder="Produit"
                            class="form-control" >

                        <has-error :form="form" field="name"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="text" name="description" required="prenom" 
                            placeholder="Description"
                            class="form-control">

                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                        <input  type="text" name="quantite" required="quantite" 
                            placeholder="quantite"
                            class="form-control" >
                        <has-error :form="form" field="quantite"></has-error>
                    </div>
                    <div class="form-group">
                        <input  type="text" name="prix_achat" required="prix_achat" 
                            placeholder="Prix achat"
                            class="form-control" >
                        <has-error :form="form" field="email"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="Numero" name="prix_vente" required="telephone" 
                            placeholder="Prix vente"
                            class="form-control" >
                        <has-error :form="form" field="Numero"></has-error>
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