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
    <style>
        .formContainer {
            width: 45%;
            margin: 0;
            padding: 0px;
            background-color: white;
            /* border: 1px solid rgb(180, 59, 59); */
            display: flex;
            flex-direction: column;
        }
        
        .formContainer label h5 {
            margin-bottom: 5px;
        }
        
        .formContainer input,
        .formContainer select,
        .formContainer textarea {
            /* width: 100%; */
            padding: 8px;
            border: 1px solid rgb(180, 59, 59);
            margin-bottom: 8px;
            font-size: 16px;
            border-radius: 5px;
        }
        
        #cosNovetat {
            height: 150px;
        }
        
        .submitButton {
            background-color: rgb(180, 59, 59);
            color: white;
            border: 2px solid rgb(180, 59, 59);
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.05s ease;
            border-radius: 10px;
            font-weight: normal;
        }

        .submitButton:hover {
            background-color: white; 
            color: rgb(180, 59, 59);
            font-weight: bold;
        }

        select option[value=""] {
        color: #D3D3D3; /* Gris muy claro */
        }

        /* .submitButton {
            background-color: white;
            color: rgb(180, 59, 59);
            border: 2px solid rgb(180, 59, 59);
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.15s ease;
            border-radius: 10px;
            font-weight: bold;
        }
        
        .submitButton:hover {
            background-color: rgb(180, 59, 59);
            color: white;
            font-weight: normal;
        } */
    </style>
    
    <h2>Afegir NOVETAT</h2>
    
    <form action="gestor.php" method="POST" class="formContainer">
    <!-- Variable invisible -->
    <input type="hidden" name="gestor" id="gestor" value="afegirNovetat">
    
    <!-- Selección de usuario -->
    <label for="idUsuari"><h5>Selecciona usuari:</h5></label>
    <select name="idUsuariAN" id="idUsuari" required>
        <option value="" disabled selected>Qui ets?</option>
        <option value="1">Consellera</option>
        <option value="2">Conseller</option>
    </select>


    
    <!-- Título de la novedad -->
    <label for="titolNovetat"><h5>Títol de la novetat:</h5></label>
    <input type="text" name="titolNovetatAN" id="titolNovetat" maxlength="255" required>
    
    <!-- Cuerpo de la novedad -->
    <label for="cosNovetat"><h5>Cos de la novetat:</h5></label>
    <textarea name="cosNovetatAN" id="cosNovetat" required></textarea>
    
    <!-- Fecha de la novedad -->
    <label for="dataNovetat"><h5>Data de la novetat:</h5></label>
    <input type="datetime-local" name="dataNovetatAN" id="dataNovetat" required>
    
    <!-- Botón de envío -->
    <button type="submit" class="submitButton">Enviar</button>
    
    </form>
</main>
    
    <?php
    $conn = new Conexion();
    $sql = 0;
    $result = $conn->query($sql);
    $conn = null;
    ?>
</body>
</html>
