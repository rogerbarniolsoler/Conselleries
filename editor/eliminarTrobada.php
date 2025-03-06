<?php
require("../conexion_pdo.php");
$currentPage = 'Editor'; // Cambia según la página actual
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conselleria interior</TITLE>
    <link href="../estils.css" rel="stylesheet">
</head>

<body>
     
     <?php 
     include("../header.php"); 
     ?>
 
<main>
    
    <h2>Eliminar TROBADA</h2>
    




</main>
    
    <?php


    $conn = new Conexion();
    $sql = 0;
    $result = $conn->query($sql);

       
    $conn = null;
    ?>

    
</body>
</html>
