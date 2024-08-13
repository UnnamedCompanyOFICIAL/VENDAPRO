<?php
include "db_conn.php";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Prepara a consulta SQL para excluir o produto
    $sql = "DELETE FROM produtos WHERE Id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            header("Location: produto.php"); // Redireciona de volta para a página de produtos
            exit();
        } else {
            echo "Erro ao deletar o produto: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
} else {
    echo "ID do produto não fornecido ou método de solicitação inválido.";
}

$conn->close();
?>
