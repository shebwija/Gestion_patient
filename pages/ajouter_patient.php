<?php

require_once "connection.php";

if(isset($_REQUEST['btn_insert']))
{

	$nom	= $_REQUEST['nom'];	
	$prenom	= $_REQUEST['prenom'];
	$sexe	= $_REQUEST['sexe'];	
	$age	= $_REQUEST['age'];
	$telephone	= $_REQUEST['telephone'];
	$adresse	= $_REQUEST['adresse'];
	$groupeSanguin	= $_REQUEST['groupeSanguin'];
	$maladie	= $_REQUEST['maladie'];
	$antecedent	= $_REQUEST['antecedent'];
		
	if(empty($nom)){
		$errorMsg="Svp Entrez nom";
	}
	else if(empty($prenom)){
		$errorMsg="Svp Entrez prenom";
	}
	else if(empty($sexe)){
		$errorMsg="Svp Entrez le sexe";
	}
	else if(empty($age)){
		$errorMsg="Svp Entrez l'âge";
	}
	else if(empty($telephone)){
		$errorMsg="Svp Entrez le telephone";
	}
	else if(empty($adresse)){
		$errorMsg="Svp Entrez l'adresse";
	}
	else if(empty($groupeSanguin)){
		$errorMsg="Svp Entrez le groupe sanguin";
	}
	else if(empty($maladie)){
		$errorMsg="Svp Entrez la maladie actuelle";
	}
	else if(empty($antecedent)){
		$errorMsg="Svp Entrez l'antecedent medical'";
	}
	else
	{
		try
		{
			if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare('INSERT INTO Patient(nom,prenom,sexe,age,telephone,adresse,groupeSanguin,maladie,antecedent) VALUES(:nom,:prenom,:sexe,:age,:telephone,:adresse,:groupeSanguin,:maladie,:antecedent)'); //sql insert query					
				$insert_stmt->bindParam('nom',$nom);
				$insert_stmt->bindParam(':prenom',$prenom); 
				$insert_stmt->bindParam(':sexe',$sexe);
				$insert_stmt->bindParam(':age',$age); 
				$insert_stmt->bindParam('telephone',$telephone);
				$insert_stmt->bindParam(':adresse',$adresse); 
				$insert_stmt->bindParam(':groupeSanguin',$groupeSanguin);
				$insert_stmt->bindParam(':maladie',$maladie);
				$insert_stmt->bindParam(':antecedent',$antecedent);
					
				if($insert_stmt->execute())
				{
					$insertMsg="Données insérees avec succès........"; 
					header("refresh:3;liste_patient.php"); 
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Document</title>
    <?php include 'style_page.php'?>
</head>
<body>
<?php include 'menu_page.php'?>  
		
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<h2 class="text-center p-">Enregistrer un patient</h2> <br>
              <form method="post" class="form-horizontal" style="justify-content-centrer">
				
			<div class="col md-12 d-flex">
			  <div class="col md-6">
				<div class="col-sm-6 mb-3">
				<input type="text" name="nom" class="form-control" placeholder="Nom" />
				</div>
				</div>

				<div class="col md-6">
				<div class="col-sm-6 mb-3">
				<input type="text" name="prenom" class="form-control" placeholder="Prénom" />
				</div>
			  </div>
			</div>

			<div class="col md-12 d-flex">
			  <div class="col md-6">   
				<div class="col-sm-6 mb-3">
				<select class="form-select"  aria-label="Default select example" name="sexe">
                <option selected > Sexe </option>
                <option value="Masculin">Masculin</option>
                <option value="Feminin">Feminin</option>
                </select>
				</div>
				</div>

				<div class="col md-6">

				<div class="col-sm-6 mb-3">
				<input type="number" name="age" class="form-control" placeholder="Age" />
				</div>
				</div>
			</div>

			<div class="col md-12 d-flex">
			  <div class="col md-6">     
				<div class="col-sm-6 mb-3">
				<input type="number" name="telephone" class="form-control" placeholder="Téléphone" />
				</div>
				</div>

				<div class="col md-6">
				<div class="col-sm-6 mb-3">
				<input type="text" name="adresse" class="form-control" placeholder="Adresse" />
				</div>
				</div>
			</div>

			<div class="col md-12 d-flex">
			  <div class="col md-6">
				<div class="col-sm-6 mb-3">
				<select class="form-select"  aria-label="Default select example" name="groupeSanguin">
                <option selected > Groupe sanguin </option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
				<option value="B+">B+</option>
                <option value="B-">B-</option>
				<option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
				<option value="O+">0+</option>
                <option value="O-">0-</option>
                </select>
				</div>
				</div>

				<div class="col md-6">
				<div class="col-sm-6 mb-3">
				<input type="text" name="maladie" class="form-control" placeholder="Maladie actuelle" />
				</div>
				</div>
			</div>

				<div class="col-sm-6 mb-3">
				<input type="text" name="antecedent" class="form-control" placeholder="Antécédent médical" />
				</div>
				
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
					<!-- Button trigger modal -->
<button  onclick='return confirm("Etes-vous sûr?")' type="submit" name="btn_insert" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Enregistrer</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
    
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment vous enregistrer?
      </div>
      <div class="modal-footer">
	   <button  class="btn btn-success" type="submit"  name="btn_insert" class="btn btn-danger" value="Insérer" >Valider</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button> 
      </div>
    </div>
  </div>
</div>
 <a href="liste_patient.php" class="btn btn-outline-primary">Supprimer</a>
</div>
</form>
			
</div>		
</div>			
</div>
<br>
      <?php include 'footer.php'?>
      <?php include 'js.php'?>									
	</body>
</html>