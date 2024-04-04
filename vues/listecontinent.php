<div class="container mt-5">

    <div class="row pt-3">
       <div class="col-9">
          <h2>Liste des continent</h2>
        </div>
       <div class="col-3"><a href="index.php?uc=continent&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une continent</a></div>
    </div> 
    <table class="table table-hover table-striped">
<thead>
  <thead class="thead-dark">
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-8">Libellé</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach($lescontinent as $continent){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$continent->getnum()."</td>";
        echo "<td class='col-md-9'>".$continent->getlibelle()."</td>";
        echo "<td class='col-md-2'>
        <a href='index.php?uc=continent&action=update&num=".$continent->getnum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalsupr' data-toggle='modal' date-message='Voulez vous supprimer ce conitnents ?'data-suppression='index.php?uc=continents&action=delete&num".$continent->getnum()."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
    </td>";
    echo "</tr>";
    }
?>
  </tbody>
</table>
</div> 