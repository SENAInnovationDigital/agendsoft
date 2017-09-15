<?php
include("bdd.php");
if(isset($_POST['id_medico']))
    {
      $changeMedico = $_POST['id_medico'];
      echo "OK";
    }
else{
  $changeMedico = 2;
}
   $sql = "SELECT c.id_cit, c.fechaIni_cit, c.fechaFin_cit, c.id_trata, c.docPac_cit, p.nombres_pac, p.apellidos_pac, p.telefono1_pac
           FROM cita c, paciente p, medico m
           WHERE c.docPac_cit = p.doc_pac
           and c.docMed_cit = m.doc_med
           and m.id_med = $changeMedico";
  $req = $bdd->prepare($sql);
  $req->execute();
  $events = $req->fetchAll();
?>
