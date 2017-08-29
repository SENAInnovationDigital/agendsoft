<?php
// Connexion à la base de données
include('conexion.php');
//echo $_POST['title'];


	$cedulaPac = $_POST['cedulaPac'];
	$idmotivo = $_POST['motivo'];
	$start = $_POST['start'];
  $end = $_POST['end'];
	$idmedico = '12345';
	$idsecretaria = '112233';



	$sql = mysqli_query ($conexion, "INSERT INTO cita (docPac_cit, docMed_cit, docSec_cit, id_trata, fechaIni_cit, fechaFin_cit)
																	values ('$cedulaPac', '$idmedico', '$idsecretaria', '$idmotivo', '$start', '$end')");
	//$req = $bdd->prepare($sql);
	//$req->execute();

	$idEvento = mysqli_insert_id($conexion);

	if ($sql == false) {
	 die ('Erreur prepare');
	}
	else{
		echo json_encode(array('estado'=>'OK','eventid'=>$idEvento));
	}


//header('Location: '.$_SERVER['HTTP_REFERER']);


?>
