<?php
require("conexion_pdo.php");
$currentPage = 'Escollir trobada'; // Cambia según la página actual
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
        $sqldata = "SELECT id, nomCita, descripcioCita, dataCita, dataCanvi
        FROM consCites 
        WHERE acceptacioCita = 0 && completCita = 0 && dataCanvi = 1 OR dataCanvi = 2";
        $resultdata = $conn->query($sqldata);

        if($resultdata != false && $resultdata->rowCount() > 0)
        {
            foreach($resultdata as $z)
            {
                //PEL TITOL
                if($z["dataCanvi"] == 1)
                {
                    echo "<h2>LA CONSELLERA D'AFERS EXTERIORS PROPOSA UN CANVI DE DATA:</h2>";
                }
                if($z["dataCanvi"] == 2)
                {
                    echo "<h2>EL CONSELLER D'AFERS INTERIORS PROPOSA UN CANVI DE DATA:</h2>";
                }

                //PER LA PERSONA QUE VOL EL CANVI
                if($z["dataCanvi"] == 0 && $z["usuariCreacio"] == 1 )
                {
                    $canvi = 2;
                }
                if($z["dataCanvi"] == 0 && $z["usuariCreacio"] == 2 )
                {
                    $canvi = 1;
                }
                if($z["dataCanvi"] == 1)
                {
                    $canvi = 2;
                }
                if($z["dataCanvi"] == 2)
                {
                    $canvi = 1;
                }

                echo "<div class='citaConfirmadaContainer'>";
                
                echo "<h2>" . $z["nomCita"] . "</h2>";
                echo "<p>" . $z["descripcioCita"] . "</p>";
                // Data confi
                setlocale(LC_TIME, 'ca_ES.UTF-8');

                $dataOriginal = $z["dataCita"];
                $dataFormatejada = strftime('%A %e de %B del %Y a les %H:%M', strtotime($dataOriginal));

                // Mostrar con la primera letra en mayúscula
                echo "<h3>" . ucfirst($dataFormatejada) . "</h3>";


                //Boto acceptar trobada
                echo "<h4 style='margin-bottom: 20px;'><a href='confirmacioTrobada.php?id=" . $z["id"] . "' style='color: rgb(180, 59, 59); text-decoration: none; display: inline-block; margin-bottom: 20px;' onmouseover='this.style.color=\"red\"; this.style.textDecoration=\"underline\"' onmouseout='this.style.color=\"rgb(180, 59, 59)\"; this.style.textDecoration=\"none\"'>Acceptar trobada amb canvi de data</a></h4>";
        

                //FORMULARI
                echo '<form action="novaData.php" method="POST">';
                echo '    <label for="data" style="font-weight: bold; font-size: 16px;">Introdueixi una nova data:</label><br>';
                echo '    <input type="datetime-local" id="data" name="data" required ';
                echo '        style="width: 300px; padding: 8px; border: 1px solid rgb(180, 59, 59); ';
                echo '        border-radius: 5px; font-size: 12px; margin: 10px 0;">';
                echo '    <br>';
                // Campo oculto para enviar el ID
                echo '    <input type="hidden" name="id" value="' . $z["id"] . '">';
                //Camo ocult per enviar num canviData
                echo '    <input type="hidden" name="dataCanvi" value="' . $canvi . '">';

                echo '    <button type="submit" ';
                echo '        style="background-color: rgb(180, 59, 59); border-radius: 5px; color: white; border: none; ';
                echo '        padding: 10px 15px; font-size: 14px; cursor: pointer; ';
                echo '        transition: background-color 0.3s, text-decoration 0.3s; margin-bottom: 5px;">';
                echo '        Enviar';
                echo '    </button>';
                echo '    <style>';
                echo '        button:hover {';
                echo '            background-color: red;';
                echo '            text-decoration: underline;';
                echo '        }';
                echo '    </style>';
                echo '</form>';


                echo "</div>";
                break;
            }
        }

    ?>
    
    <h2>ESCOLLIR TROBADA</h2>

    <div class="novetatsContainer">
    <!-- DIV ROGER -->
    <div class="novetatsDiv">
        <h3>TROBADES PER LA CONSELLERA D'AFERS EXTERIORS:</h3>
    <?php
        
        $conn = new Conexion();
        $sqlRoger = "SELECT id, nomCita, descripcioCita, dataCita, acceptacioCita, usuariCreacio 
        FROM consCites 
        WHERE acceptacioCita = 0 && usuariCreacio = 2 && completCita = 0 && dataCanvi = 0";
        $resultRoger = $conn->query($sqlRoger);

        if($resultRoger && $resultRoger->rowCount() > 0)
        {
            foreach ($resultRoger as $x)
            {
                echo "<article class='articleDivs'>";
                echo "<h3>" . $x["nomCita"] . "</h3>";
                echo "<p>" . $x["descripcioCita"] . "</p>";
                // Configurar el idioma a catalán
                setlocale(LC_TIME, 'ca_ES.UTF-8');

                $dataOriginal = $x["dataCita"];
                $dataFormatejada = strftime('%A %e de %B del %Y a les %H:%M', strtotime($dataOriginal));

                // Mostrar con la primera letra en mayúscula
                echo "<h5>" . ucfirst($dataFormatejada) . "</h5>";

                echo "<h4><a href='confirmacioTrobada.php?id=" . $x["id"] . "' style='color: rgb(180, 59, 59); text-decoration: none;' onmouseover='this.style.color=\"red\"; this.style.textDecoration=\"underline\"' onmouseout='this.style.color=\"rgb(180, 59, 59)\"; this.style.textDecoration=\"none\"'>Acceptar trobada</a> / <a href='canviarDiaTrobada.php?id=" . $x["id"] . "' style='color: rgb(180, 59, 59); text-decoration: none;' onmouseover='this.style.color=\"red\"; this.style.textDecoration=\"underline\"' onmouseout='this.style.color=\"rgb(180, 59, 59)\"; this.style.textDecoration=\"none\"'>Canviar data</a></h4>";

                echo "</article>";
            }
        }
        else
        {
            echo "<h3>Actualment no hi ha trobades per escollir</h3>";
        }
    ?>
    </div>

    <!-- DIV BRUNA -->
    <div class="novetatsDiv">
        <h3>TROBADES PEL CONSELLER D'AFERS INTERIORS:</h3>
    <?php
        
        $sqlBruna = "SELECT id, nomCita, descripcioCita, dataCita, acceptacioCita, usuariCreacio 
        FROM consCites 
        WHERE acceptacioCita = 0 && usuariCreacio = 1 && completCita = 0 && dataCanvi = 0";
        $resultBruna = $conn->query($sqlBruna);

        if($resultBruna && $resultBruna->rowCount() > 0)
        {
            foreach ($resultBruna as $x)
            {
                echo "<article class='articleDivs'>";
                echo "<h3>" . $x["nomCita"] . "</h3>";
                echo "<p>" . $x["descripcioCita"] . "</p>";
                // Data confi
                setlocale(LC_TIME, 'ca_ES.UTF-8');

                $dataOriginal = $x["dataCita"];
                $dataFormatejada = strftime('%A %e de %B del %Y a les %H:%M', strtotime($dataOriginal));

                // Mostrar con la primera letra en mayúscula
                echo "<h5>" . ucfirst($dataFormatejada) . "</h5>";
               
                echo "<h4><a href='confirmacioTrobada.php?id=" . $x["id"] . "' style='color: rgb(180, 59, 59); text-decoration: none;' onmouseover='this.style.color=\"red\"; this.style.textDecoration=\"underline\"' onmouseout='this.style.color=\"rgb(180, 59, 59)\"; this.style.textDecoration=\"none\"'>Acceptar trobada</a> / <a href='canviarDiaTrobada.php?id=" . $x["id"] . "' style='color: rgb(180, 59, 59); text-decoration: none;' onmouseover='this.style.color=\"red\"; this.style.textDecoration=\"underline\"' onmouseout='this.style.color=\"rgb(180, 59, 59)\"; this.style.textDecoration=\"none\"'>Canviar data</a></h4>";

                echo "</article>";
            }
        }
        else
        {
            echo "<h3>Actualment no hi ha trobades per escollir</h3>";
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