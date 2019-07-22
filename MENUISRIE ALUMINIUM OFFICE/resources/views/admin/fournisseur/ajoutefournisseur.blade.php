<!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" v-show="!editmode" id="addNewLabel">Ajouter un nouveau fournisseur</h4>
                   
                </div>
                <form action="Fournisseur/" method="POST" >
                     {{csrf_field()}}
                     
                <div class="modal-body">
                     <div class="form-group">
                        <input  type="text" name="id"  required="id" 
                            placeholder="Code de fournisseur"
                            class="form-control"  >

                        <has-error :form="form" field="name"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="text" name="nom" required="nom" 
                            placeholder="Nom"
                            class="form-control" >

                        <has-error :form="form" field="name"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="text" name="prenom" required="prenom" 
                            placeholder="Prenom"
                            class="form-control">

                        <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="form-group">
                        <input  type="email" name="email" required="email" 
                            placeholder="Courrier électronique"
                            class="form-control" >
                        <has-error :form="form" field="email"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="Numero" name="telephone" required="telephone" 
                            placeholder="Numero de telephone"
                            class="form-control" >
                        <has-error :form="form" field="Numero"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="adresse" name="adresse" required="adresse" 
                            placeholder="Adresse"
                            class="form-control" >
                        <has-error :form="form" field="text"></has-error>
                    </div>
                     <div class="form-group">
                        <input  type="text" name="compagnie" required="compagnie" 
                            placeholder="Nom de la compagnie"
                            class="form-control" >
                        <has-error :form="form" field="compagnie"></has-error>
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