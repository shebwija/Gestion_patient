<?php
  session_start();
  include "configsupp.php";
  
  $sql="DELETE FROM patient WHERE idpatient='{$_GET["id"]}'";
  if($con->query($sql)){
    flash('msg','User Deleted Successfully');
    header("location:liste_patient.php");
  }else{
    flash('msg','User Deleted Failed','red');
    header("location:ajouter_patient.php");
  }
?>