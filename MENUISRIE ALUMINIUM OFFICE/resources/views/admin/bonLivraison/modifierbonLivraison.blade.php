<!-- Modal -->
<div class="modal fade" id="modifierbonLivraison" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier le bon de livraison  </h4>
      
      </div>
     <form action="{{route('bonLivraison.update','test')}}" method="post">
           {{method_field('patch')}}
              {{csrf_field()}}
          <div class="modal-body">
                  <input type="hidden" name="id" id="id">
                 
                   <div class="form-group">
                     <label for="nom">Objectif</label>
                        <input  type="text" name="objectif" required="objectif" id="objectif" 
                            placeholder="Objectif de bon de livraison"
                            class="form-control" >
                        <has-error :form="form" field="text"></has-error>
                    </div>
                    <div class="form-group">
                       <label for="nom">TVA</label>
                        <input  type="text" name="TVA" required="TVA" id="tva_bonlivraison" 
                            placeholder="TVA"
                            class="form-control" >
                        <has-error :form="form" field="text"></has-error>
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