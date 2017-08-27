<?php
include("bdd.php");

  $id_pac= $_POST['id'];
  $nom_pac = $_POST['nom'];
  $ape_pac = $_POST['ape'];
  $sex_pac = $_POST['sex'];
  $nac_pac = $_POST['nac'];
  $tiposangre_pac = $_POST['tiposangre'];
  $ciu_pac = $_POST['ciu'];
  $dir_pac = $_POST['dir'];
  $tel1 = $_POST['tel1'];
  $tel2 = $_POST['tel2'];
  $email_pac = $_POST['email'];


  $sql = "call RegistroPaciente('$id_pac','$nom_pac', '$ape_pac', '$sex_pac',
                                  '$nac_pac', '$tiposangre_pac', '$dir_pac',
                                  '$ciu_pac', '$tel1', '$tel2', '$email_pac')";

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
    else{
      die ('OK');
    }

?>
