<?php
require_once './fonctions/base.php';
require_once './fonctions/autoload.php';

$bd=bd();
$Patient_ctrl =new PatientController($bd);
if(isset($_GET['idpatient']))
{
    $idpatient=$_GET['idpatient'];
    $valuer=$Patient_ctrl->get((int)$idpatient);
    //echo $id;
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Detail patient</title>
        <?php include '../style/style.php';?>
    </head>
    <body>

    <?php include 'menu_footer/menu_page.php';?> 
    <div class="nic_bg ">
    <br>
    <div style="text-align: center;">
      <h4 style="font-family: Algerian; text-align: center;">DETAIL DU PATIENT N° <?= $idpatient ?></h4>
    </div>
<div class="nic_detail d-flex" id='formulaire_bircof' style="background-color: white; margin-left: 20px; margin-right: 20px;">
  <div class="nic_detail2 col-md-4" style="margin: 30px;">
    <label for="" style="width: 200px;"><strong>Nom:</strong></label> <span> <?= $valuer->getNom()?> </span> <br>
    <label for="" style="width: 200px;"><strong>Prenom:</strong></label> <span><?= $valuer->getPrenom()?></span> <br>
    <label for="" style="width: 200px;"><strong>Sexe:</strong></label><span> <?= $valuer->getSexe()?> </span>  <br>
    <label for="" style="width: 200px;"><strong>Telephone:</strong></label><span> <?= $valuer->getTelephone()?> </span>  <br>
    <label for="" style="width: 200px;"><strong>Adresse:</strong></label> <span> <?= $valuer->getAdresse()?> </span>  <br>
    <label for="" style="width: 200px;"><strong>Age:</strong></label><span> <?= $valuer->getAge()?> </span>  <br>
    <label for="" style="width: 200px;"><strong>Groupe Sanguin:</strong></label><span> <?= $valuer->getGroupeSanguin()?> </span>  <br>
    <label for="" style="width: 200px;"><strong>Maladie:</strong></label><span> <?= $valuer->getMaladie()?> </span>  <br>
    <label for="" style="width: 200px;"><strong>Antecedent:</strong></label><span> <?= $valuer->getAntecedent()?> </span>  <br>
  </div>
  <div class="nic_detail3 col-md-8" style="margin: 30px;">
  <img src="../image/ima.jpg" style="height: 50vh;" width="85%"  alt="">
  </div>
</div>   
<br> 
<div class='button'>
<a href="liste_pat.php"> <button class="btn btn-outline-danger" id="btn-ajout" style="background-color: danger; margin-left: 20px;"> Retour </button></a>
</div>
<br>
</div>
<?php include 'menu_footer/pied.php';?>
<?php include '../style/script.php';?>
    </body>
</html>

