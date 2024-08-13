<?php
include "db_conn.php";

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    $produto = $_POST['produto'];
    $marca = $_POST['marca'];
    $fornecedor = $_POST['fornecedor'];
    $codigo = $_POST['codigo'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $fabricacao = $_POST['fabricacao'];
    $vencimento = $_POST['vencimento'];

    // Converte datas para o formato yyyy-mm-dd
    $fabricacao = date('Y-m-d', strtotime($fabricacao));
    $vencimento = date('Y-m-d', strtotime($vencimento));

    // Usa prepared statements para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO produtos (produto, marca, fornecedor, codigo, quantidade, valor, fabricacao, vencimento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $produto, $marca, $fornecedor, $codigo, $quantidade, $valor, $fabricacao, $vencimento);

    if ($stmt->execute()) {
        header("Location: produto.php");
        exit();
    } else {
        echo "Erro ao adicionar o Produto: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap">
    <style>
    body {
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background-color: #3A5567;
        color: #fff;
        font-family: 'Carter One', cursive;
        padding: 15px;
    }

    .navbar-brand {
        font-size: 24px;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .form-control {
        margin-bottom: 15px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center mb-2">
        SISTEMA - PDV
    </nav>
    <div class="container form-container">
        <div class="text-center mb-5">
            <h3>Cadastrar Novo Produto</h3>
            <p class="text-muted">Complete o formulário abaixo para cadastrar seu novo Produto</p>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Nome do Produto:</label>
                    <input type="text" class="form-control" name="produto" placeholder="ARROZ - 10KG..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Marca do Produto:</label>
                    <input type="text" class="form-control" name="marca" placeholder="Marca do Produto..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fornecedor do Produto:</label>
                    <input type="text" class="form-control" name="fornecedor" placeholder="Coca-Cola..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Código de Barras:</label>
                    <input type="text" class="form-control" name="codigo" placeholder="..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Quantidade em Estoque:</label>
                    <input type="text" class="form-control" name="quantidade" placeholder="10..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Valor do Produto:</label>
                    <input type="text" class="form-control" name="valor" placeholder="Número sem '.' Apenas ','..."
                        required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data de Fabricação:</label>
                    <input type="date" class="form-control" name="fabricacao">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data de Vencimento:</label>
                    <input type="date" class="form-control" name="vencimento">
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success" name="submit">Salvar</button>
                <a href="produto.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>