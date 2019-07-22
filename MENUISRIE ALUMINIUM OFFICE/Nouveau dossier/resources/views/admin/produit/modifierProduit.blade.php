<!-- Modal -->
<div class="modal fade" id="modifierProduit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier Produit </h4>
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
      <form action="{{route('produit.update','test')}}" method="post">
           {{method_field('patch')}}
            {{csrf_field()}}
          <div class="modal-body">
                <input type="hidden" name="id" id="id">
                     <div class="form-group">
                      <label for="nom">Produit</label>
                        <input  type="text" name="produit" required="nom" id="produit"
                            placeholder="Produit"
                            class="form-control" >

                        <has-error :form="form" field="name"></has-error>
                    </div>
                     <div class="form-group">
                      <label for="nom">Description</label>
                        <input  type="text" name="description" required="prenom" id="description"
                            placeholder="Description"
                            class="form-control">

                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                      <label for="nom">Prix de achat </label>
                        <input  type="text" name="prix_achat" required="email" id="prix_achat"
                            placeholder="Prix achat"
                            class="form-control" >
                        <has-error :form="form" field="email"></has-error>
                    </div>
                     <div class="form-group">
                      <label for="nom">Prix de vente</label>
                        <input  type="Numero" name="prix_vente" required="telephone" id="prix_vente"
                            placeholder="Prix vente"
                            class="form-control" >
                        <has-error :form="form" field="Numero"></has-error>
                    </div>
                     

                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
      </form>

    </div>
  </div>
</div>