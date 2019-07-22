
<!DOCTYPE html>
<html>
<head>
  <title>BON DE COMMANDE {{$data->id}}</title>
   <meta charset="utf-8">
</head>


 
<style type="text/css">
    
    #Numero_factur{
            margin-top: 10%;
            font-size: 24px;
            text-align: center;
        }
    #Object{
        font-size: 20px;
        text-align: left;
        margin-right: 100px;
    }
    #table{
        width: 100%;
        border:solid;
    }
    #table2{
       float: right;
         width: 38%;
        background-color: black;
    }
    #table2 td {
       
            text-align: center;
         }

    #table2 tr {
       
            background-color: aliceblue;
            font-weight: bold;
        }
    .footer {
    border-top: solid;  
    position: fixed;
    left: 0;
    bottom: 5%;
    width: 100%;
    color: black;
    text-align: center;
}
.body {position: fixed;}
   
</style>


<body>
<header class="header">

 

<div style="display: block;">
 
 <div style="float: left;">  <img src="logo.jpg" width="200px" height="150px" ></div>
 <div style="float: right;">  <h4> TETOUAN, le {{$data->created_at->format('d M Y')}}</h4>

 </div>
</div>
<br>
<div id="Numero_factur"><center> BON DE COMMANDE N° : {{$data->id}}</center> <br></div>

</header>
<body>
<div id="Object">
   <p> Object : {{$data->objectif}}</p> 
   <p> Fournisseur :  {{$data->fournisseur->id}} {{$data->fournisseur->nom}} {{$data->fournisseur->prenom}}</p>
  
</div>

<table id="table" style='right: 20px '> 
<thead style="border-bottom: solid;  ">     
            <tr>
              
                <td style="width: 50%;text-align: center; border-right:solid;">DESIGNATION</td>
                <td style="width: 10%;text-align: center; border-right:solid;">QTE</td>
                <td style="width: 15%;text-align: center; border-right:solid;">PU</td>
                <td style="width: 21%;text-align: center;">PT</td>                     
           </tr>
</thead>

   @foreach($data->lineboncommandes as $boncommande)
<tbody> <tr> 
     
        
           
            <th style="width: 50%; border-right:solid;">{{$boncommande->produit->description}}</th>
            <th style="width: 10%; text-align: center; border-right:solid;">{{$boncommande->quantite}}</th>
            <th style="width: 15%; text-align: center; border-right:solid;">{{$boncommande->HT}}</th>
            <th style="width: 21%; text-align: center;" >{{$boncommande->HT * $boncommande->quantite}}</th>
        
    </tr></tbody>
 @endforeach 

</table> 

 <table id="table2" >
  <tr>
  <td >Total DH/HT</td><td style="width: 58%;">{{$data->lineboncommandes->sum('totale')}}</td><br></tr>
  <tr> <td>TVA 20%</td><td style="width: 58%;">{{($data->TVA * $data->lineboncommandes->sum('totale'))/100 }}</td><br></tr>
   <tr> <td>Total DH/TTC</td><td style="width: 58%;">{{($data->lineboncommandes->sum('totale')) + (($data->TVA * $data->lineboncommandes->sum('totale'))/100)}}</td><br></tr>
  </tr>
</table>
<div ><h5 style="font-weight: bold; text-decoration: underline;">Arrêtée la présente boncommande à la somme de :</h5>
{{ucwords($f->format(($data->lineboncommandes->sum('totale')) + (($data->TVA * $data->lineboncommandes->sum('totale'))/100)))}} dirhams Toutes Taxes Comprises.</div>

</body>


 <div class="footer">
  <p>
    Siège social :{{$Compagnie->Compagnie_adresse}}<br>
    {{$Compagnie->Compagnie_ice}}<br>
    Tél:{{$Compagnie->Compagnie_telephone}} -Fax :{{$Compagnie->Compagnie_fax}} - {{$Compagnie->Compagnie_web}}  <br>
  </p>
</div>

</body>




</html>
