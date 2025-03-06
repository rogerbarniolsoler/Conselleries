<?php
    require("conexion_pdo.php");
    $idConf = $_GET["id"];

    $conn = new Conexion();
    $sql = "UPDATE consCites SET completCita = 1 WHERE id = $idConf";
    $result = $conn->query($sql);
    
    echo '<meta http-equiv="refresh" content="0;url=historicTrobades.php">';

    $conn = null;
?>