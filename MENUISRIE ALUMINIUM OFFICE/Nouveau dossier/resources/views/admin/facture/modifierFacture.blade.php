<!-- Modal -->
<div class="modal fade" id="modifierFacture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier la facture  </h4>
      
      </div>
     <form action="{{route('Facture.update','test')}}" method="post">
           {{method_field('patch')}}
              {{csrf_field()}}
          <div class="modal-body">
                  <input type="hidden" name="id" id="id">
                 
                  <div class="form-group">
                    <label for="nom">Objectif</label>
                        <input  type="Numero" name="objectif" id="objectif" 
                            
                            class="form-control" >
                        <has-error :form="form" field="Numero"></has-error>
                    </div>
                  <div class="form-group">
                    <label for="nom">TVA</label>
                        <input  type="Numero" name="TVA" id="tva_facture" 
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