<!-- Modal -->
<div class="modal fade" id="modifierboncommande"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier le bon de commande    </h4>
      
      </div>
     <form action="{{route('BonCommande.update','test')}}" method="post">
           {{method_field('patch')}}
              {{csrf_field()}}
          <div class="modal-body">
                  <input type="hidden" name="id" id="id">
                  
                  <div class="form-group">
                    <label for="objectif">Objectif</label>
                    <input type="text" class="form-control" name="objectif" id="objectif" required="quantite">
                  </div>
                   <div class="form-group">
                    <label for="TVA">TVA</label>
                    <input type="text" class="form-control" name="TVA" id="tva_boncommande" required="TVA">
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