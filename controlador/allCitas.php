<?php
if(isset($_SESSION['doc_sec']))
    {
    }

   $sql = "SELECT c.id_cit, c.fechaIni_cit, c.fechaFin_cit, c.id_trata, c.docPac_cit, p.nombres_pac, p.apellidos_pac, p.telefono1_pac
           FROM cita c, paciente p
           WHERE c.docPac_cit = p.doc_pac";
  $req = $bdd->prepare($sql);
  $req->execute();
  $events = $req->fetchAll();
?>
