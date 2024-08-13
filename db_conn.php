<?php
// Detalhes da conexão com o banco de dados
$servername = "127.0.0.1";
$port = 3307;
$username = "UNNAMED_COMPANY";
$password = "Uc9088152022/";
$dbname = "sistema - pdv";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>