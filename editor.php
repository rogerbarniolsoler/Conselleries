<?php
require("conexion_pdo.php");
$currentPage = 'Editor'; // Cambia según la página actual
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conselleria interior</TITLE>
    <link href="estils.css" rel="stylesheet">
</head>

<body>
     
     <?php 
     include("header.php"); 
     ?>
 
<main>
    
    <?php

        $conn = new Conexion();
        $sql = 0;
        $result = $conn->query($sql);

    ?>
       
    <h2>EDITOR</h2>
    <h3><a href='editor/afegirNovetat.php' style='color: rgb(180, 59, 59); text-decoration: none;' 
       onmouseover='this.style.color="red"; this.style.textDecoration="underline";' 
       onmouseout='this.style.color="rgb(180, 59, 59)"; this.style.textDecoration="none";'>Afegir NOVETAT</a></h3>

    <h3><a href='editor/eliminarNovetat.php' style='color: rgb(180, 59, 59); text-decoration: none;' 
        onmouseover='this.style.color="red"; this.style.textDecoration="underline";' 
        onmouseout='this.style.color="rgb(180, 59, 59)"; this.style.textDecoration="none";'>Eliminar NOVETAT</a></h3><br>

    <h3><a href='editor/crearTrobada.php' style='color: rgb(180, 59, 59); text-decoration: none;' 
        onmouseover='this.style.color="red"; this.style.textDecoration="underline";' 
        onmouseout='this.style.color="rgb(180, 59, 59)"; this.style.textDecoration="none";'>Crear TROBADA</a></h3>

    <h3><a href='editor/eliminarTrobada.php' style='color: rgb(180, 59, 59); text-decoration: none;' 
        onmouseover='this.style.color="red"; this.style.textDecoration="underline";' 
        onmouseout='this.style.color="rgb(180, 59, 59)"; this.style.textDecoration="none";'>Eliminar TROBADA</a></h3>




</main>
    
    <?php
    // Cerrar la conexión
    $conn = null;
    ?>

    
</body>
</html>
