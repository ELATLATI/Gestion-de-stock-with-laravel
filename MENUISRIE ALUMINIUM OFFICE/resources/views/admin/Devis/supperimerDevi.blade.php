<!-- Modal -->
<div class="modal modal-danger fade" id="supprimer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Confirmation de suppression</h4>
      </div>
      <form action="{{route('Devis.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Êtes-vous sûr de vouloir supprimer ceci?
				</p>
	      		<input type="hidden" name="id" id="id" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">Non, annuler</button>
	        <button type="submit" class="btn btn-warning">Oui, supprimer</button>
	      </div>
      </form>
    </div>
  </div>
</div>