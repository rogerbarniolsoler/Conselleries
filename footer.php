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
        .header-down {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px 150px 0px 150px;
        }
        .header-down .logo img {
            height: 50px;
            margin-left: 4px;
        }
       
    </style>
</head>

<body>
    <header class="header">
        <!-- Línea 1 -->

        <div class="header-down">
        <p>Departament de Conselleries - </p>
            <div class="logo">
                <img src="logo.png" alt="Logo Generalitat">
            </div>

    </header>
</body>
</html>
