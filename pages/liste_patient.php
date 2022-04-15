<?php

require_once "connection.php";
	
if(isset($_REQUEST['delete_id']))
{
	// selectionner la donnée de la base de donnée à supprimer 
	$code=$_REQUEST['delete_id'];	//obtenir delete_id et le deposer dans $id variable
		
	$select_stmt= $db->prepare('SELECT * FROM Patient WHERE idpatient =:idpatient');
	$select_stmt->bindParam(':idpatient',$idpatient);
	$select_stmt->execute();
	$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		
	//supprimer une donnée de la base de donnée 
	$delete_stmt = $db->prepare('DELETE FROM Patient WHERE idpatient =:idpatient');
	$delete_stmt->bindParam(':idpatient',$idpatient);
	$delete_stmt->execute();
		
	header("Location:liste_patient.php");
}
	
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'style_page.php';?>
</head>
<body>
<?php include 'menu_page.php';?>  
      <h1 style="font-family: Algerian; text-align: center;">LISTE DES ARTICLES</h1>
	

	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                   
                        <div class="panel-body imprimable">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOM</th>
											<th>PRENOM</th>
                                            <th>SEXE</th>
                                            <th>AGE</th>
                                            <th>TELEPHONE</th>
                                            <th>ADRESSE</th>
                                            <th>GROUPE SANGUIN</th>
                                            <th>MALADIE ACTUELLE</th>
                                            <th>ANTECEDENT MEDICAL</th>
                                            <th>MODIFIER</th>
                                            <th>SUPPRIMER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$select_stmt=$db->prepare("SELECT * FROM Patient");	
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['idpatient']; ?></td>
                                            <td><?php echo $row['nom']; ?></td>
											<td><?php echo $row['prenom']; ?></td>
                                            <td><?php echo $row['sexe']; ?></td>
                                            <td><?php echo $row['age']; ?></td>
                                            <td><?php echo $row['telephone']; ?></td>
                                            <td><?php echo $row['adresse']; ?></td>
                                            <td><?php echo $row['groupeSanguin']; ?></td>
                                            <td><?php echo $row['maladie']; ?></td>
                                            <td><?php echo $row['antecedent']; ?></td>
                                            <td><a href="modifier.php?update_id=<?php echo $row['idpatient']; ?>" class="btn "> <img src="../image/edit.jpg"  alt=""> </a></td>
                                            <td><a href="?delete_id=<?php echo $row['idpatient']; ?>" class="btn " onclick='return confirm("Etes-vous sûr de vouloir supprimer?")'>  <img src="../image/Close.jpg"  alt=""> </a></td>
                                        </tr>
                                    <?php
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                </div>
				
		</div>
		
	</div>
			
    <div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href="imprimable.php">
  <button class="btn btn-primary me-md-2" type="button">Imprimer</button>
  </a>
    </div>
    </div>
    <br>
      <?php include 'footer.php';?>
      <?php include 'js.php';?>	
      
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


	</body>
</html>