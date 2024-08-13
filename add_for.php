<?php
include "db_conn.php";

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];

    // Insere o novo fornecedor no banco de dados
    $sql = "INSERT INTO `fornecedores` (nome, email ,telefone, cnpj, endereco) 
            VALUES ('$nome', '$email','$telefone', '$cnpj', '$endereco')";

    if (mysqli_query($conn, $sql)) {
        header("Location: fornecedor.php");
        exit();
    } else {
        echo "Erro ao adicionar o Fornecedor: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Fornecedor</title>
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
    <nav class="navbar navbar-light justify-content-center mb-3">
        SISTEMA - PDV
    </nav>
    <div class="container form-container">
        <div class="text-center mb-5">
            <h3>Cadastrar Novo Fornecedor</h3>
            <p class="text-muted">Complete o formulário abaixo para cadastrar seu novo Fornecedor</p>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">NOME:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do Fornecedor..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">E-MAIL:</label>
                    <input type="text" class="form-control" name="email" placeholder="E-mail do Fornecedor...">
                </div>
                <div class="col-md-6">
                    <label class="form-label">TELEFONE:</label>
                    <input type="tel" class="form-control" name="telefone" placeholder="Seu Telefone..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" placeholder="Seu CNPJ..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Endereço:</label>
                    <input type="text" class="form-control" name="endereco"
                        placeholder="RUA, BAIRRO, Nº, CIDADE, ESTADO..." required>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success" name="submit">Salvar</button>
                <a href="fornecedor.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>