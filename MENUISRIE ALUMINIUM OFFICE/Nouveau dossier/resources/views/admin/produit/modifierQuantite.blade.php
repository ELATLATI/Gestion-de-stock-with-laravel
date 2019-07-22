<!-- Modal -->
<div class="modal fade" id="modifierQuantite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier la quantité de produit {{$produit->id}}</h4>
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
      <form action="{{route('quantite.update','test')}}" method="post">
           {{method_field('patch')}}
            {{csrf_field()}}
          <div class="modal-body">
                <input type="hidden" name="id_line" id="id_line">
                <div class="form-group">
                      <label for="nom">Quantite</label>
                        <input  type="Numero" name="quantite" required="quantite" id="quantite"
                            placeholder="Quantite"
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
