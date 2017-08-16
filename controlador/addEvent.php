<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){

	$title = $_POST['title'];
	$codigo = $_POST['codigo'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$secretaria = 'jhoana';

	$sql = "INSERT INTO events(idPaciente, title, start, end, color, secretaria ) values ('$codigo', '$title', '$start', '$end', '$color','$secretaria')";
	//$req = $bdd->prepare($sql);
	//$req->execute();

	echo $sql;

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);


?>
