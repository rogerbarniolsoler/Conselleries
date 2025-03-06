<?php
    require("conexion_pdo.php");
    
    $id = $_POST["id"];
    $novaData = $_POST["data"];
    $canvi = $_POST["dataCanvi"];

    $novaDataSQL = str_replace("T", " ", $novaData) . ":00"; //data corregida a datetime SQL
    
    // echo $id . "<br>";
    // echo $novaDataSQL . "<br>";

    $conn = new Conexion();
    $sql = "UPDATE consCites SET dataCita = '$novaDataSQL', dataCanvi = $canvi WHERE id = $id";
    $result = $conn->query($sql);
    
    // if($result != false)
    // {
    //     echo "<h1>S'HA ENVIAT CORRECTAMENT</h1>";
    // }

    echo '<meta http-equiv="refresh" content="0;url=escollirTrobada.php">';

    $conn = null;
?>