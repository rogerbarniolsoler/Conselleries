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
<h2>CANVIAR DATA</h2>
<?php
        $idCita = $_GET["id"];

        $conn = new Conexion();
        $sqldata = "SELECT nomCita, descripcioCita, dataCita, usuariCreacio, dataCanvi
        FROM consCites 
        WHERE id = $idCita";
        $resultdata = $conn->query($sqldata);
                
        
        if($resultdata != false && $resultdata->rowCount() > 0)
        {
            foreach($resultdata as $z)
            {
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
                echo "<h5>" . ucfirst($dataFormatejada) . "</h5>";

                //FORMULARI
                echo '<form action="novaData.php" method="POST">';
                echo '    <label for="data" style="font-weight: bold; font-size: 16px;">Introdueixi una nova data:</label><br>';
                echo '    <input type="datetime-local" id="data" name="data" required ';
                echo '        style="width: 300px; padding: 8px; border: 1px solid rgb(180, 59, 59); ';
                echo '        border-radius: 5px; font-size: 12px; margin: 10px 0;">';
                echo '    <br>';
                // Camp ocult per enviar l'ID
                echo '    <input type="hidden" name="id" value="' . $idCita . '">';
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

</main>
    
    <?php
    // Cerrar la coneyión
    $conn = null;
    include("footer.php");
    ?>

    
</body>
</html>