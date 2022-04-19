<?php
require_once 'connection.php';
require_once 'autoload.php';

$bd=bd();
$patient_ctrl =new PatientController($bd);

if(isset($_GET['update_id']))
{
    $id=$_GET['update_id'];
    $valuer=$patient_ctrl->get((int)$id);
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
    
            <h4 class="titre_bircof">Modifier un patient N° <?= $valuer->getId() ?></h4>

        <div id='formulaire_bircof'>
            <form class="form_bircof" method="post" action="modif_patient.php" enctype = "multipart/form-data">
                <div class="form-row">
                      <!-- ajout du champ id -->
                        <input type="text" class="form-control" name="idpatient" style="display: none" value="<?= $valuer->getId() ?>">

                    <div class="col">
                        <input type="text" class="form-control" name="nom"  required autofocus value="<?= $valuer->getNom()?>">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="prenom" required value="<?= $valuer->getPrenom()?>">
                    </div>
                </div>

                  <br>

                <div class="form-row">
                    <div class="col">
                    <div class="form-group">
                            <select class="custom-select" name="sexe" required>
                            <?php
                                if($valuer->getGenre()!=""){
                                echo "<option>".$valuer->getGenre()."</option>"; 
                            }
                            ?>
                                <option value="">Sexe</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                    </div>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Age" name="age" required value="<?= $valuer->getAge()?>">
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress2" name="adresse" placeholder="Adresse" value="<?= $valuer->getAddresse()?>">
                        </div>
                    </div>    
                    <div class="col">
                        <input type="tel" class="form-control" placeholder="Téléphone" name="telephone" required value="<?= $valuer->getTelephone()?>">
                    </div>
                    
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <select class="form-control" name="groupeSanguin" required>
                        <?php
                        if($valuer->getGroupesanguin()!=""){
                                echo "<option>".$valuer->getG_sanguin()."</option>"; 
                            }
                        ?>
                            <option>Groupe Sanguin</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                            <option>O+</option>
                            <option>0-</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Maladie actuelle" name="maladie" required value="<?= $valuer->getM_actuelle()?>">
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">   
                        <div class="form-group">
                        <form class="was-validated">
                        <div class="mb-3">
                            <textarea class="form-control" id="validationTextarea" placeholder="Antecedants medicaux" name="antecedent" required >
                            <?php
                               if($valuer->getAntecedent()!=""){
                                  echo $valuer->getAntecedent(); 
                               }
                            ?>
                            </textarea>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
                <div class="buttons">
                <div class='button'>
                    <input class="btn btn-outline-success" id="btn_update" type="submit" value="Modifier">
                </div>
                <div class='button'>
                <a href="liste_patient.php" class="btn btn-danger" id="btn-ajout"> Retour </button></a>
                </div>
            </div>
            </form>
            </div>

        </div>    
        <footer>
            <div class='footer_bircof'>
            <?php include 'footer.php';?>
          <?php include 'js.php';?>
            </div>
        </footer>
        
    </body>
</html>

