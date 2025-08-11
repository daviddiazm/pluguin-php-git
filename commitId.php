<?php

$idCommit = null;

if (isset($_GET['id'])) {
    // esto es lo unico que puedo ejecutar ya que el antivirus elimina el archivo cada vez que intento hacer git show
    $idCommit = $_GET['id'];
    echo $idCommit;
}

?>