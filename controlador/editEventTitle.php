<?php
require_once('bdd.php');
if (isset($_POST['eliminar']) && isset($_POST['id_cit'])){

	$id_cit = $_POST['id_cit'];

	$sql = "DELETE FROM cita WHERE id_cit = $id_cit";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());

	 die ('No se hizo la consulta');
	}

}elseif (isset($_POST['motivo']) && isset($_POST['id_cit'])){

	$id_cit = $_POST['id_cit'];
	$motivo = $_POST['motivo'];
	$start = $_POST['start'];
	$end  = $_POST['end'];


	$sql = "UPDATE cita SET id_trata = '$motivo', fechaIni_cit = '$start', fechaFin_cit = '$end' WHERE id_cit = $id_cit";


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
header('Location: ../index.php');


?>
