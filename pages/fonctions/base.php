<?php 
function bd()
{
try {
$bdd= new PDO('mysql:host=localhost;dbname=base_patient','root','');

} catch (Exception $e) {
	$e->getMessage();
}
 return $bdd;
}
?>
