<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['start']) && isset($_POST['end']) && isset($_POST['motivo'])){

	$cedulaPac = $_POST['cedulaPac'];
	$idmedico = '12345';
	$idsecretaria = '112233';
	$idmotivo = $_POST['motivo'];
	$start = $_POST['start'];
	$end = $_POST['end'];


	$sql = "INSERT INTO cita (docPac_cit, docMed_cit, docSec_cit, id_trata, fechaIni_cit, fechaFin_cit)
					values ('$cedulaPac', '$idmedico', '$idsecretaria', '$idmotivo', '$start', '$end')";
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
