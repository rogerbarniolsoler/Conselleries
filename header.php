<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header {
            width: 100%;
        }
        /* Línea 1: Gris oscuro, logo y botón */
        .header-top {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: end;
            padding: 5px 150px 0px 150px;
        }
        .header-top .logo img {
            height: 50px;
        }
        .header-top .contact-btn {
            color: white;
            padding: 0px 0px 10px 0px;
            background: none;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }
        .header-top .contact-btn:hover {
            text-decoration: underline;
        }

        /* Línea 2: Gris claro con el nombre del departamento */
        .header-middle {
            background-color: #555;
            color: white;
            text-align: left;
            padding: 1px 150px 1px 150px;
            font-size: 18px;
            font-weight: normal;
        }

        /* Línea 3: Menú de navegación */
        .header-bottom {
            background-color:rgb(229, 229, 229);
            display: flex;
            justify-content: left;
            padding: 10px 150px 10px 150px;
        }

        .header-bottom a {
            color: #333; /* Color por defecto para todos los enlaces */
            text-decoration: none;
            margin: 0px 25px 0px 0px;
            padding: 5px 0;
            font-size: 14px;
            position: relative;
        }

        .header-bottom a.active {
            color: #333; /* Color fijo para la página activa */
        }

        .header-bottom a.active::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: red; /* Línea roja solo para la página activa */
            bottom: -2px;
            left: 0;
        }

        .header-bottom a:hover {
            color: red; /* Texto en rojo al hacer hover */
        }

        .header-bottom a:hover::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: red; /* Línea roja al hacer hover */
            bottom: -2px;
            left: 0;
        }

    </style>
</head>
<?php
require("config.php");
?>
<body>
    <header class="header">
        <!-- Línea 1 -->
        <div class="header-top">
            <div class="logo">
            <a href="<?php echo BASE_URL; ?>index.php">
                <img src="logo.png" alt="Logo Generalitat">
            </a>
            </div>
            <button class="contact-btn">Contacte</button>
        </div>
        <!-- Línea 2 -->
        <div class="header-middle">
            <p>Departament de Conselleries</p>
        </div>
        <!-- Línea 3 -->
        <nav class="header-bottom">
            <a href="<?php echo BASE_URL;?>index.php" class="<?php echo $currentPage === 'Inici' ? 'active' : ''; ?>">Novetats</a>
            <a href="<?php echo BASE_URL;?>escollirTrobada.php" class="<?php echo $currentPage === 'Escollir trobada' ? 'active' : ''; ?>">Escollir trobada</a>
            <a href="<?php echo BASE_URL;?>historicTrobades.php" class="<?php echo $currentPage === 'Històric trobades' ? 'active' : ''; ?>">Històric trobades</a>
            <a href="<?php echo BASE_URL;?>editor.php" class="<?php echo $currentPage === 'Editor' ? 'active' : ''; ?>">Editor</a>
        </nav>


    </header>
</body>
</html>
