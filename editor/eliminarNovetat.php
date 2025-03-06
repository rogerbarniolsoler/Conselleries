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
    
    <h2>Eliminar NOVETAT</h2>
    <div class="novetatsContainer">
    <!-- DIV ROGER -->
    <div class="novetatsDiv">
    <h3>NOVETATS PER LA CONSELLERA D'AFERS EXTERIORS:</h3>

    <?php
        
        $conn = new Conexion();
        $sqlRoger = "SELECT id, titolNov, cosNov, dataNov, visNovetats
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
                    ?>

                    <form action="gestor.php" method="POST" class="formContainer">
                        <!-- Variable invisible -->
                        <input type="hidden" name="gestor" value="eliminarNovetat">
                        
                        <!-- Campo oculto para pasar el id de la novedad -->
                        <input type="hidden" name="id" value="<?php echo $x['id']; ?>">

                        <!-- Botón de envío -->
                        <button type="submit" class="submitButton"
                            style="color: rgb(180, 59, 59); background: none; border: none; text-decoration: none; font-weight: bold; 
                                display: inline; padding: 0; text-align: left; margin-top: 0; margin-bottom: 20px;" 
                                onmouseover="this.style.color='red'; this.style.textDecoration='underline';" 
                                onmouseout="this.style.color='rgb(180, 59, 59)'; this.style.textDecoration='none';">
                            <span style="font-size: 15px;">ELIMINAR NOVETAT</span>
                        </button>
                    </form>

                    <?php
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
            echo "<h3>No hi ha novetats per eliminar</h3>";
        }
    ?>
    </div>

    <!-- DIV BRUNA -->
    <div class="novetatsDiv">
    <h3>NOVETATS PEL CONSELLER D'AFERS INTERIORS:</h3>
    <?php
        
        $sqlBruna = "SELECT id, titolNov, cosNov, dataNov, visNovetats
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
                    ?>

                    <form action="gestor.php" method="POST" class="formContainer">
                        <!-- Variable invisible -->
                        <input type="hidden" name="gestor" value="eliminarNovetat">
                        
                        <!-- Campo oculto para pasar el id de la novedad -->
                        <input type="hidden" name="id" value="<?php echo $y['id']; ?>">

                        <!-- Botón de envío -->
                        <button type="submit" class="submitButton"
                            style="color: rgb(180, 59, 59); background: none; border: none; text-decoration: none; font-weight: bold; 
                                display: inline; padding: 0; text-align: left; margin-top: 0; margin-bottom: 20px;" 
                                onmouseover="this.style.color='red'; this.style.textDecoration='underline';" 
                                onmouseout="this.style.color='rgb(180, 59, 59)'; this.style.textDecoration='none';">
                            <span style="font-size: 15px;">ELIMINAR NOVETAT</span>
                        </button>
                    </form>

                    <?php                    
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
            echo "<h3>No hi ha novetats per eliminar</h3>";
        }
       
        $conn = null;
        ?>
    </div>
    
    </div> 



</main>
    
   

    



    
</body>
</html>
