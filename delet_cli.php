<?php
include "db_conn.php";

// Verifique se o ID foi passado corretamente
if (isset($_POST['id'])) {
    // Sanitize o valor do ID
    $Id = mysqli_real_escape_string($conn, $_POST['id']);
    
    // Prepare a consulta para evitar SQL Injection
    $sql = "DELETE FROM clientes WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $Id); // "i" indica que o parâmetro é um inteiro
        if ($stmt->execute()) {
            header("Location: cliente.php");
            exit();
        } else {
            echo "Falha ao deletar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
} else {
    echo "ID não fornecido.";
}

$conn->close();
?>