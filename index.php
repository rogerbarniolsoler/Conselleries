<?php
require("conexion_pdo.php");
$currentPage = 'Inici'; // Cambia según la página actual
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
        $sqlCita = "SELECT id, nomCita, descripcioCita, dataCita
        FROM consCites 
        WHERE acceptacioCita = 1 && completCita = 0";
        $resultCita = $conn->query($sqlCita);

        if($resultCita != false && $resultCita->rowCount() > 0)
        {
            echo "<h2>PROPERA TROBADA</h2>";

            foreach($resultCita as $z)
            {
                echo "<div class='citaConfirmadaContainer'>";
                
                echo "<h2>" . $z["nomCita"] . "</h2>";
                echo "<p>" . $z["descripcioCita"] . "</p>";
                // Data confi
                setlocale(LC_TIME, 'ca_ES.UTF-8');
                $dataOriginal = $z["dataCita"];
                $dataFormatejada = strftime('%A %e de %B del %Y', strtotime($dataOriginal));

                // Mostrar
                echo "<h4>" . ucfirst($dataFormatejada) . "</h4>";

                echo "<h4><a href='confHistoric.php?id=" . $z["id"] . "' style='color: rgb(180, 59, 59); text-decoration: none;' onmouseover='this.style.color=\"red\"; this.style.textDecoration=\"underline\"' onmouseout='this.style.color=\"rgb(180, 59, 59)\"; this.style.textDecoration=\"none\"'>Trobada realitzada</a> / <a href='cancelarTrobada.php?id=" . $z["id"] . "' style='color: rgb(180, 59, 59); text-decoration: none;' onmouseover='this.style.color=\"red\"; this.style.textDecoration=\"underline\"' onmouseout='this.style.color=\"rgb(180, 59, 59)\"; this.style.textDecoration=\"none\"'>Cancel·lar trobada</a>";

                echo "</div>";
                break;
            }
        }

    ?>

    <h2>NOVETATS</h2>

    <div class="novetatsContainer">
    <!-- DIV ROGER -->
    <div class="novetatsDiv">
    <h3>NOVETATS PER LA CONSELLERA D'AFERS EXTERIORS:</h3>
    <?php
        
        $conn = new Conexion();
        $sqlRoger = "SELECT titolNov, cosNov, dataNov, visNovetats
        FROM consNovetats 
        WHERE idUsuari = 2";
        $resultRoger = $conn->query($sqlRoger);

        if($resultRoger && $resultRoger->rowCount() > 0)
        {
            foreach ($resultRoger as $x)
            {
                if($x["visNovetats"] == 1)
                {
                    echo "<article class='articleDivs'>";
                    echo "<h3>" . $x["titolNov"] . "</h3>";
                    echo "<p>" . $x["cosNov"] . "</p>";
                    // Data confi
                    setlocale(LC_TIME, 'ca_ES.UTF-8');
                    $dataOriginal = $x["dataNov"];
                    $dataFormatejada = strftime('%A %e de %B del %Y', strtotime($dataOriginal));

                    // Mostrar
                    echo "<h5>" . ucfirst($dataFormatejada) . "</h5>";
                    echo "</article>";
                }
                else
                {
                    continue;
                }   
            }
        }
        else
        {
            echo "<h3>No hi ha novetats</h3>";
        }
    ?>
    </div>

    <!-- DIV BRUNA -->
    <div class="novetatsDiv">
    <h3>NOVETATS PEL CONSELLER D'AFERS INTERIORS:</h3>
    <?php
        
        $sqlBruna = "SELECT titolNov, cosNov, dataNov, visNovetats
        FROM consNovetats 
        WHERE idUsuari = 1";
        $resultBruna = $conn->query($sqlBruna);

        if($resultBruna && $resultBruna->rowCount() > 0)
        {
            foreach ($resultBruna as $y)
            {
                if($y["visNovetats"] == 1)
                {
                    echo "<article class='articleDivs'>";
                    echo "<h3>" . $y["titolNov"] . "</h3>";
                    echo "<p>" . $y["cosNov"] . "</p>";
                    
                    // Data confi
                    setlocale(LC_TIME, 'ca_ES.UTF-8');
                    $dataOriginal = $y["dataNov"];
                    $dataFormatejada = strftime('%A %e de %B del %Y', strtotime($dataOriginal));

                    // Mostrar
                    echo "<h5>" . ucfirst($dataFormatejada) . "</h5>";
                    echo "</article>";
                }
                else
                {
                    continue;
                }
            }
        }
        else
        {
            echo "<h3>No hi ha novetats</h3>";
        }
    ?>
    </div>
    
    </div> 
</main>
    
    <?php
    // Cerrar la coneyión
    $conn = null;
    include("footer.php");
    ?>

    
</body>
</html>