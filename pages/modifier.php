<?php

require_once "connection.php";

if(isset($_REQUEST['update_id']))
{
	try
	{
		//obtenir la mise à jour de la liste_article à travers "$id" variable
		$code = $_REQUEST['update_id']; 
		$select_stmt = $db->prepare('SELECT * FROM Patient WHERE idpatient =:idpatient');
		$select_stmt->bindParam(':idpatient',$idpatient);
		$select_stmt->execute(); 
		$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

if(isset($_REQUEST['btn_update']))
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
		$errorMsg="Svp entrez le nom";
	}
	else if(empty($prenom)){
		$errorMsg="Svp entrez le prenom";
	}	
	else if(empty($sexe)){
		$errorMsg="Svp entrez le sexe";
	}
	else if(empty($age)){
		$errorMsg="Svp entrez l'âge";
	}
	else if(empty($telephone)){
		$errorMsg="Svp entrez le telephone";
	}	
	else if(empty($adresse)){
		$errorMsg="Svp entrez l'adresse'";
	}
	else if(empty($groupeSanguin)){
		$errorMsg="Svp entrez le groupe sanguin";
	}
	else if(empty($maladie)){
		$errorMsg="Svp entrez la maladie";
	}	
	else if(empty($antecedent)){
		$errorMsg="Svp entrez l'antécedent";
	}
	else
	{
		try
		{
			if(!isset($errorMsg))
			{
				$update_stmt=$db->prepare('UPDATE Patient SET nom=:nom, prenom=:prenom, sexe=:sexe, age=:age, telephone=:telephone, adresse=:adresse, groupeSanguin=:groupeSanguin, maladie=:maladie, antecedent=:antecedent WHERE idpatient=:idpatient'); //sql update query
				$update_stmt->bindParam(':nom',$nom);
				$update_stmt->bindParam(':prenom',$prenom);
				$update_stmt->bindParam(':sexe',$sexe);
				$update_stmt->bindParam(':age',$age);
				$update_stmt->bindParam(':telephone',$telephone);
				$update_stmt->bindParam(':adresse',$adresse);
				$update_stmt->bindParam(':groupeSanguin',$groupeSanguin);
				$update_stmt->bindParam(':maladie',$maladie);
				$update_stmt->bindParam(':antecedent',$antecedent);
				$update_stmt->bindParam(':idpatient',$idpatient);
				 
				if($update_stmt->execute())
				{
					$updateMsg="Mise à jour avec succès.......";	//message de mise à jour
					header("refresh:3;liste_patient.php");	//refresh 3 second and redirect to liste_patient.php page
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
    <?php include 'style_page.php';?>
</head>
<body>
<?php include 'menu_page.php';?> 
	
	
	
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
		if(isset($updateMsg)){
		?>
			<div class="alert alert-success">
				<strong>UPDATE ! <?php echo $updateMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<center><h2>Modifier</h2></center>
			<form method="post" class="form-horizontal">

			<div class="form-row">
			  <div class="col">

				<div class="form-group mb-3">
				<label class="col-sm-3 control-label" style=" text-align: left;" >NOM</label>
				<div class="col-sm-6">
				<input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>">
				</div>
				</div>
				</div>

				<div class="col">
				<div class="form-group mb-3" >
				<label class="col-sm-3 control-label" style=" text-align: left;">PRENOM</label>
				<div class="col-sm-6">
				<input type="text" name="prenom" class="form-control" value="<?php echo $prenom; ?>">
				</div>
				</div>
				</div>

			  </div>
			</div>

				<div class="form-group mb-3">
				<label class="col-sm-3 control-label" style=" text-align: left;">SEXE</label>
				<div class="col-sm-6">
				<select class="form-select" type="text" aria-label="Default select example" name="sexe"  value="<?php echo $sexe; ?>">
                <option selected > Sexe </option>
                <option value="Masculin">Masculin</option>
                <option value="Feminin">Feminin</option>
                </select>
				</div>
				</div>

				<div class="form-group mb-3">
				<label class="col-sm-3 control-label" style=" text-align: left;">AGE</label>
				<div class="col-sm-6">
				<input type="number" name="age" class="form-control" value="<?php echo $age; ?>">
				</div>
				</div>

				<div class="form-group mb-3">
				<label class="col-sm-3 control-label" style=" text-align: left;" >TELEPHONE</label>
				<div class="col-sm-6">
				<input type="number" name="telephone" class="form-control" value="<?php echo $telephone; ?>">
				</div>
				</div>
					
				<div class="form-group mb-3" >
				<label class="col-sm-3 control-label" style=" text-align: left;">ADRESSE</label>
				<div class="col-sm-6">
				<input type="text" name="adresse" class="form-control" value="<?php echo $adresse; ?>">
				</div>
				</div>

				<div class="form-group mb-3">
				<label class="col-sm-3 control-label" style=" text-align: left;">GROUPE SANGUIN</label>
				<div class="col-sm-6">
				<select class="form-select" type="text" aria-label="Default select example" name="groupeSanguin" value="<?php echo $groupeSanguin; ?>">
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

				<div class="form-group mb-3">
				<label class="col-sm-3 control-label" style=" text-align: left;" >MALADIE ACTUELLE</label>
				<div class="col-sm-6">
				<input type="text" name="maladie" class="form-control" value="<?php echo $maladie; ?>">
				</div>
				</div>
					
				<div class="form-group mb-3" >
				<label class="col-sm-3 control-label" style=" text-align: left;">ANTECEDENT MEDICAL</label>
				<div class="col-sm-6">
				<input type="text" name="antecedent" class="form-control" value="<?php echo $antecedent; ?>">
				</div>
				</div>

				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
					<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Mettre à jour
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
    
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez vous vraiment modifier cette donnée?
      </div>
      <div class="modal-footer">
	   <button  class="btn btn-success" type="submit"  name="btn_update" class="btn btn-danger " >Valider</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button> 
      </div>
    </div>
  </div>
</div>
		<a href="liste_patient.php" class="btn btn-danger">Supprimer</a>
		</div>
		</div>
			</form>
			
		</div>
		
	</div>
			
	</div>
			<br>							
	<?php include 'footer.php';?>
    <?php include 'js.php';?>								
	</body>
</html>