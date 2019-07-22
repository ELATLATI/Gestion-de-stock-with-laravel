@extends('admin.master')
@section('content-heading')
Search fournisseur
<a style="margin-left: 60%;" href="{{URL::to('Fournisseur/')}}" class="btn btn-success"
                             >Return to Fournisseur</a>
                               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

@endsection
@section('page-title')
Search
@endsection
@section('maincontent') 
@include('admin.fournisseur.modifierfournisseur')
@include('admin.fournisseur.supprimerfournisseur')
<div class="panel-body">
     <div class="input-group">
      <input type="text" class="form-control" name="search" id="search"  placeholder="Search Customer Data" />
       <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                     <i class="fa fa-search"></i>
                                </button>
                            </span>
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>id</th>
         <th>nom</th>
         <th>prenom</th>
         <th>email</th>
         <th>telephone</th>
         <th>adresse</th>
         <th>compagnie</th>
          <th>action</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
      </div>
  </div>
</div>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>


                           
                       

     @endsection
