
<!-- Modal -->
<div class="modal fade" id="modifierclient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier client </h4>
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
      <form action="{{route('client.update','test')}}" method="post">
           {{method_field('patch')}}
            {{csrf_field()}}
          <div class="modal-body">
                     <input type="hidden" name="id" id="id">
                 <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" required="nom">
                </div>
                 <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" required="prenom">
                </div>
                 <div class="form-group">
                    <label for="email">Courrier électronique</label>
                    <input type="email" class="form-control" name="email" id="email" required="Courrier électronique">
                </div>
                 <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="Numero" class="form-control" name="telephone" id="telephone" required="telephone">
                </div>
                 <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" name="adresse" id="adresse" required="adresse">
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