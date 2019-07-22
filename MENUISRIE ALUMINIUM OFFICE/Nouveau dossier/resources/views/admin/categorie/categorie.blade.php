<!-- Modal -->
        <div class="modal fade" id="NewCategorie" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" v-show="!editmode" id="addNewLabel">Ajouter un nouveau categorie</h4>
                   
                </div>
                <form action="Categorie/" method="POST" >
                     {{csrf_field()}}
                <div class="modal-body">
                     <div class="form-group">
                        <input  type="text" name="id"  required="id" 
                            placeholder="Code de categorie"
                            class="form-control"  >

                        <has-error :form="form" field="name"></has-error>
                    </div>
                      <div class="form-group">
                        <input  type="text" name="categorie"  required="categorie" 
                            placeholder="Categorie"
                            class="form-control"  >

                        <has-error :form="form" field="name"></has-error>
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