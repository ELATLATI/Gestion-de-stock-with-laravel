<script>

  
  $('#modifier').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var nom = button.data('nom') 
      var prenom = button.data('prenom') 
      var email = button.data('email') 
      var telephone = button.data('telephone') 
      var adresse = button.data('adresse') 
      var compagnie = button.data('compagnie') 
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #nom').val(nom);
      modal.find('.modal-body #prenom').val(prenom);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #telephone').val(telephone);
      modal.find('.modal-body #adresse').val(adresse);
      modal.find('.modal-body #compagnie').val(compagnie);
     
})
   $('#supprimer').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
})
   $('#detaille').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
})

  
  $('#modifierLinedevi').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var ht_produit = button.data('ht_produit') 
      var quantite = button.data('quantite') 
       var id_produit = button.data('id_produit')
      
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #ht_produit').val(ht_produit);
      modal.find('.modal-body #quantite').val(quantite);
       modal.find('.modal-body #id_produit').val(id_produit);
     
     
})

  
  $('#modifierLineFacture').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var ht_produit = button.data('ht_produit') 
      var quantite = button.data('quantite') 
       var id_produit = button.data('id_produit') 
      
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #ht_produit').val(ht_produit);
      modal.find('.modal-body #quantite').val(quantite);
      modal.find('.modal-body #id_produit').val(id_produit);
     
     
})


  
  $('#modifierLineboncommande').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var ht_produit = button.data('ht_produit') 
      var quantite = button.data('quantite') 
      var id_produit = button.data('id_produit') 
      
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #ht_produit').val(ht_produit);
      modal.find('.modal-body #quantite').val(quantite);
      modal.find('.modal-body #id_produit').val(id_produit);
     
     
})
   $('#supprimerLinedevi').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
})

  
  
  $('#modifierLinebonlivraison').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var ht_produit = button.data('ht_produit') 
      var quantite = button.data('quantite') 
      var id_produit = button.data('id_produit') 
      
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #ht_produit').val(ht_produit);
      modal.find('.modal-body #quantite').val(quantite);
      modal.find('.modal-body #id_produit').val(id_produit);
     
     
})
   

  
  $('#modifierclient').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var nom = button.data('nom') 
      var prenom = button.data('prenom') 
      var email = button.data('email') 
      var telephone = button.data('telephone') 
      var adresse = button.data('adresse') 
      var commande = button.data('commande') 
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #nom').val(nom);
      modal.find('.modal-body #prenom').val(prenom);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #telephone').val(telephone);
      modal.find('.modal-body #adresse').val(adresse);
      modal.find('.modal-body #commande').val(commande);
     
})
   $('#supprimerclient').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
})
  


  
  $('#modifierdevi').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      
      var objectif = button.data('objectif')
      var tva = button.data('tva')
     
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
      modal.find('.modal-body #objectif').val(objectif);
      modal.find('.modal-body #tva').val(tva);
      
     
})
   
  


  
  $('#modifierbonLivraison').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
       var objectif = button.data('objectif')
        var tva_bonlivraison = button.data('tva_bonlivraison')
     
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #objectif').val(objectif);
      modal.find('.modal-body #tva_bonlivraison').val(tva_bonlivraison);
      
})
   
  

  
  $('#modifierdevi').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      
      var description = button.data('description')
      var tva = button.data('tva')
     
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #tva').val(tva);
      
     
})
   
  

  
  $('#modifierFacture').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var objectif = button.data('objectif') 
      var tva_facture = button.data('tva_facture') 
      
     
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #objectif').val(objectif);
      modal.find('.modal-body #tva_facture').val(tva_facture);
     
      
     
})
   
  

  
  $('#modifierboncommande').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var objectif = button.data('objectif')
      var tva_boncommande = button.data('tva_boncommande')
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
      modal.find('.modal-body #objectif').val(objectif);
      modal.find('.modal-body #tva_boncommande').val(tva_boncommande);     
     
})
   
  

  $('#modifierQuantite').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id_line = button.data('id_line') 
      var quantite = button.data('quantite') 
     
      
      var modal = $(this)
      modal.find('.modal-body #id_line').val(id_line);
      modal.find('.modal-body #quantite').val(quantite);
      
     
})
   
  


  
  $('#modifierProduit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var id_famille = button.data('id_famille') 
      var id_category = button.data('id_category') 
      var id_fournisseur = button.data('id_fournisseur') 
      var produit = button.data('produit') 
      var description = button.data('description') 
      var prix_achat = button.data('prix_achat') 
      var prix_vente = button.data('prix_vente') 
      var quantite = button.data('quantite') 
            
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #id_famille').val(id_famille);
      modal.find('.modal-body #id_category').val(id_category);
      modal.find('.modal-body #id_fournisseur').val(id_fournisseur);
      modal.find('.modal-body #produit').val(produit);
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #prix_achat').val(prix_achat);
      modal.find('.modal-body #prix_vente').val(prix_vente);
      modal.find('.modal-body #quantite').val(quantite);
     
})
   $('#supprimerProduit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
})
   $('#detailleProduit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
     
})


</script>