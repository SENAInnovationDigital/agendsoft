<?php
// Connexion à la base de données
include('conexion.php');
include('../estructura/navbar.php');
//echo $_POST['title'];
	if(isset($_SESSION['doc_sec'])){
		$idsecretaria = $_SESSION['doc_sec'];
	}

	$cedulaPac = $_POST['cedulaPac'];
	$idmotivo = $_POST['motivo'];
	$start = $_POST['start'];
  $end = $_POST['end'];
	$idsecretaria = $idsecretaria;

	$idmedico="";
	if (isset( $_COOKIE['variable'] ))
	{
	  $idmedico =$_COOKIE['variable'];
	}
	else {
	    $idmedico =1;
	}

	$sql1 = mysqli_query ($conexion,"SELECT m.doc_med FROM  medico m 	WHERE m.id_med = '$idmedico' ");
	$resultadoConsulta =mysqli_fetch_array($sql1);
  $doc=$resultadoConsulta['doc_med'];

	$sql = mysqli_query ($conexion, "INSERT INTO cita (docPac_cit, docMed_cit, docSec_cit, id_trata, fechaIni_cit, fechaFin_cit)
																	values ('$cedulaPac', '$doc', '$idsecretaria', '$idmotivo', '$start', '$end')");
	//$req = $bdd->prepare($sql);
	//$req->execute();

	$idEvento = mysqli_insert_id($conexion);

	if ($sql == false) {
	 die ('Erreur prepare');
	}
	else{
		echo json_encode(array('estado'=>'OK','eventid'=>$idEvento));
	}



?>
