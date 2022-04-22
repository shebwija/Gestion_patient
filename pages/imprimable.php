<?php
require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimer</title>
    <?php include 'style.php';?>
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body onload="window.print()">
<h1 style="font-family: Bahnschrift SemiCondensed; text-align: center;">LISTE DES PATIENTS</h1>
<div class="panel-body imprimable">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>NOM</th>
											<th>PRENOM</th>
                                            <th>SEXE</th>
                                            <th>TELEPHONE</th>
                                            <th>ADRESSE</th>
                                            <th>GROUPE SANGUIN</th>
                                            <th>MALADIE ACTUELLE</th>
                                            <th>ANTECEDENT MEDICAL</th>
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
                                            <td><?php echo $row['groupeSanguin']; ?></td>
                                            <td><?php echo $row['maladie']; ?></td>
                                            <td><?php echo $row['antecedent']; ?></td>
                                        </tr>
                                    <?php
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <?php include 'script.php';?>
                        <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
                        <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
                        <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
                        </body>
</html>