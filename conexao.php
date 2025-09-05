<?php
$host = "localhost";   // servidor
$user = "root";        // usuário do banco
$pass = "";            // senha (ajuste se tiver)
$db   = "cadastro_clientes"; // nome do banco

$conn = new mysqli($host, $user, $pass, $db);

// Verifica conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
