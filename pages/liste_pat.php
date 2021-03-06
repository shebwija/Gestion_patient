<?php

require_once "./fonctions/connection.php";
	
if(isset($_REQUEST['delete_id']))
{
	// selectionner la donnée de la base de donnée à supprimer 
	$idpatient=$_REQUEST['delete_id'];	//obtenir delete_id et le deposer dans $id variable
		
	$select_stmt= $db->prepare('SELECT * FROM Patient WHERE idpatient =:idpatient');
	$select_stmt->bindParam(':idpatient',$idpatient);
	$select_stmt->execute();
	$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		
	//supprimer une donnée de la base de donnée 
	$delete_stmt = $db->prepare('DELETE FROM Patient WHERE idpatient =:idpatient');
	$delete_stmt->bindParam(':idpatient',$idpatient);
	$delete_stmt->execute();
		
	header("Location:liste_pat.php");
}
	
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste</title>
    <?php include '../style/style.php';?>
</head>
<body>
<?php include 'menu_footer/menu_page.php';?>
<div class="nic_bg  ">
<h1 style="font-family: Algerian; text-align: center;">LISTE DES PATIENTS</h1>
	
	<div class="wrapper ">
	
	<div class="container ">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                        <!-- /.panel-heading -->
                        <div class="panel-body imprimable">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered table-hover" style="background-color: white;">
                                    <thead>
                                        <tr class="bg-warning">
                                            <th>NOM</th>
										                      	<th>PRENOM</th>
                                            <th>SEXE</th>
                                            <th>TELEPHONE</th>
                                            <th>ADRESSE</th>
                                            <th>DETAILS</th>
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
                                            <td><?php echo $row['nom']; ?></td>
										                      	<td><?php echo $row['prenom']; ?></td>
                                            <td><?php echo $row['sexe']; ?></td>
                                            <td><?php echo $row['telephone']; ?></td>
                                            <td><?php echo $row['adresse']; ?></td>
                                            <td><a href="detail_patient.php?idpatient=<?php echo $row['idpatient']; ?>" class="btn "> <img src="../image/user.jpg"  alt=""> </a></td>
                                            <td><a href="edit.php?update_id=<?php echo $row['idpatient']; ?>" class="btn "> <img src="../image/edit.jpg"  alt=""> </a></td>
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
  <button class="btn btn-outline-primary me-md-2" type="button">Imprimer la liste</button>
  </a>
    </div>
    </div>
    <br>
</div>
      <?php include 'menu_footer/pied.php';?>
      <?php include '../style/script.php';?>
      
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