<div class="container mt-5">

    <div class="row pt-3">
       <div class="col-9">
          <h2>Liste des nationalité</h2>
        </div>
       <div class="col-3"><a href="index.php?uc=nationalite&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalite</a></div>
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
    foreach($lesNationalite as $Nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$Nationalite->getnum()."</td>";
        echo "<td class='col-md-9'>".$Nationalite->getlibelle()."</td>";
        echo "<td class='col-md-2'>
        <a href='index.php?uc=nationalite&action=update&num=".$Nationalite->getnum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalSuppression' data-toggle='modal' date-message='Voulez vous supprimer cette nationalite ?'data-suppression='index.php?uc=Nationalite&action=delete&num".$Nationalite->getnum()."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
    </td>";
    echo "</tr>";
    }
?>
  </tbody>
</table>
</div> 