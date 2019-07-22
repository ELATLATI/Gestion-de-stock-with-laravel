search.blade.php
     <h1    align="center" class="title display-table-cell "><b>{{ $posts->count() }} Results for {{ $query }}</b></h1>
    </div><!-- slider -->
      @if($posts->count() > 0)
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
             <tr>
               <th>id Produit</th>
                <th>id famille</th>
                <th>id ctegory</th>
                <th>id fournisseur</th>
                <th>produit</th>
                <th>description</th>
                <th>prix achat</th>
                <th>prix vente</th>
                <th>quantité</th>
                <th>Action</th>
                                        
                                      
            </tr>
        </thead>
         <tbody>



              
                    @foreach($posts as $post)
                                    
                    <tr class="odd gradeX">        
                        <td> {{$post->id}}</td>
                        <td> {{$post->id_famille}}</td>
                        <td> {{$post->id_category}}</td>
                        <td> {{$post->id_fournisseur}}</td>
                        <td> {{$post->produit}}</td>
                        <td> {{$post->description}}</td>
                        <td> {{$post->prix_achat}}</td>
                        <td> {{$post->prix_vente}}</td>
                        <td> {{$post->quantite}}</td>
                        <td> 
                            <a class="btn btn-primary" data-id="{{$post->id}}" data-id_famille="{{$post->id_famille}}" data-id_category="{{$post->id_category}}" data-id_fournisseur="{{$post->id_fournisseur}}" data-produit="{{$post->produit}}" data-description="{{$post->description}}" data-prix_achat="{{$post->prix_achat}}" ata-prix_vente="{{$post->prix_vente}}" data-quantite="{{$post->quantite}}"
                           data-toggle="modal" data-target="#modifier"  >Modifier</a>
                            <a class="btn btn-danger" data-id="{{$post->id}}" data-toggle="modal" data-target="#supprimer"> supprimer</a>
                                             <a href="{{URL::to('ShowFournisseur/'.$post->id)}}" class="btn btn-default">détalis</a>
                                        </td>
                                     
                                                
                                    </tr>
                                
                                     @endforeach
                                </tbody>
                             </table>
 @else
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1">
                                <div class="blog-info">
                                    <h4 class="title">
                                        <strong>Sorry, No post found :(</strong>
                                    </h4>
                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endif
                           