<!-- Modal -->
<div class="modal fade" id="modifierLinedevi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier le produit de devis {{$devis->id}} </h4>
      
      </div>
     <form action="{{route('linedevi.update','test')}}" method="post">
           {{method_field('patch')}}
           {{csrf_field()}}
          <div class="modal-body">
                  <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_produit" id="id_produit">
                 
                  <div class="form-group">
                    <label for="HT">HT</label>
                    <input type="text" class="form-control" name="HT" id="ht_produit" >
                 </div>
                
                  

                 <div class="form-group">
                    <label for="Quantite">Quantite</label>
                    <input type="text" class="form-control" name="quantite" id="quantite" required="quantite">
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