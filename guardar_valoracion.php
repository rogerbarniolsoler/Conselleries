<?php
require("conexion_pdo.php");

if(isset($_POST["id"], $_POST["tipo"], $_POST["valor"])) {
    $id = $_POST["id"];
    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];

    $campo = ($tipo == "consellera") ? "valConsellera" : "valConseller";

    $conn = new Conexion();
    $sql = "INSERT INTO consValoracio (id, $campo) VALUES (:id, :valor) 
            ON DUPLICATE KEY UPDATE $campo = :valor";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["id" => $id, "valor" => $valor]);

    echo "Valoración guardada";
}
?>
