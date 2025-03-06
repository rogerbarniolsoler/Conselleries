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

</main>
    
<?php
    $conn = new Conexion();

    //COMPROVACIÓ QUE REVO ALGO PER PARAMETRE
    if (isset($_POST["gestor"])) {
        $action = $_POST["gestor"];
    } 
    else
    {
        $action = "ERROR";
    }

    
    if($action === "ERROR")
    {
        echo "<h3>ERROR. action =  </h3>" . $action;
    }


    if($action === "afegirNovetat")
    {
        //echo "<h3>IF = </h3>" . $action;
        //FUNCIONA PERFECTAMENT
        $idUserAN = $_POST["idUsuariAN"];
        $titolAN = $_POST["titolNovetatAN"];
        $cosAN = $_POST["cosNovetatAN"];
        $dataNOAN = $_POST["dataNovetatAN"];
        $dataAN = date("Y-m-d H:i:s", strtotime($dataNOAN));

        $sqlAN = "INSERT INTO consNovetats(titolNov, cosNov, dataNov, idUsuari)
        VALUES ('$titolAN', '$cosAN', '$dataAN', $idUserAN)";
        $conn->query($sqlAN);
    }

    
    if($action === "crearTrobada")
    {
        //echo "<h3>IF = </h3>" . $action;
        //FUNCIONA PERFECTAMENT
        $idUserCT = $_POST["idUsuariCT"];
        $titolCT = $_POST["titolTrobadaCT"];
        $cosCT = $_POST["cosTrobadaCT"];
        $dataNOCT = $_POST["dataTrobadaCT"];
        $dataCT = date("Y-m-d H:i:s", strtotime($dataNOCT));

        $sqlCT = "INSERT INTO consCites(nomCita, descripcioCita, dataCita, usuariCreacio)
        VALUES ('$titolCT', '$cosCT', '$dataCT', $idUserCT)";
        $conn->query($sqlCT);
    }

    if($action === "eliminarNovetat")
    {
        //echo "<h3>IF = </h3>" . $action;
        //FUNCIONA PERFECTAMENT
        $idNovEN = $_POST["id"];

        $sqlCT = "UPDATE consNovetats SET visNovetats = 0 WHERE id = $idNovEN";
        $conn->query($sqlCT);
    }

  
        
    $conn = null;
?>

    
</body>
</html>
