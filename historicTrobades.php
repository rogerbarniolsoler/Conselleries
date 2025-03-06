<?php
require("conexion_pdo.php");
$currentPage = 'Històric trobades'; // Cambia según la página actual
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
     <!-- Incluir el header -->
     <?php 
     include("header.php"); 
     ?>
 
<main>
           
    <?php
        $conn = new Conexion();
        $sqlHist = "SELECT id, nomCita, descripcioCita, dataCita
        FROM consCites 
        WHERE completCita=1";
        $resultHist = $conn->query($sqlHist);

        if($resultHist != false && $resultHist->rowCount() > 0)
        {
            echo "<h2>HISTÒRIC DE TROBADES</h2>";

            foreach($resultHist as $z)
            {
                echo "<div class='historicContainer'>";
                
                echo "<h2>" . $z["nomCita"] . "</h2>";
                echo "<p>" . $z["descripcioCita"] . "</p>";
                // Data confi
                setlocale(LC_TIME, 'ca_ES.UTF-8');
                $dataOriginal = $z["dataCita"];
                $dataFormatejada = strftime('%A %e de %B del %Y', strtotime($dataOriginal));

                // Mostrar
                echo "<h4>" . ucfirst($dataFormatejada) . "</h4>";

                echo "<h4>VALORACIÓ:</h4>";
                echo "<p> Consellera:</p>";
                echo "<p> Conseller:</p>";

                echo "</div>";
                // break;
            }
        }
        else
        {
            echo "<h2>ENCARA NO S'HAN FORMALITZAT TROBADES</h2>";
        }

    ?>
        
</main>
    
    <?php
    // Cerrar la conexión
    $conn = null;
    ?>

    
</body>
</html>
