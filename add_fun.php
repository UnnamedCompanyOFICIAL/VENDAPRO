<?php
include "db_conn.php";

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $cargo = $_POST['cargo'];
    $pagamento = $_POST['pagamento'];
    $nascimento = $_POST['nascimento'];
    $prospecção = $_POST['prospeccao'];

    // Converte datas para o formato yyyy-mm-dd
    $nascimento = date('Y-m-d', strtotime($nascimento));
    $prospeccao = date('Y-m-d', strtotime($prospeccao));

    // Usa prepared statements para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO funcionarios (nome, telefone, cpf, endereco, cargo, pagamento, nascimento, prospeccao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nome, $telefone, $cpf, $endereco, $cargo, $pagamento, $nascimento, $prospeccao);

    if ($stmt->execute()) {
        header("Location: funcionario.php");
        exit();
    } else {
        echo "Erro ao adicionar o Funcionário: " . $stmt->error;
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
    <nav class="navbar navbar-light justify-content-center mb-3">
        SISTEMA - PDV
    </nav>
    <div class="container form-container">
        <div class="text-center mb-5">
            <h3>Cadastrar Novo Funcionário</h3>
            <p class="text-muted">Complete o formulário abaixo para cadastrar seu novo Funcionário</p>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Seu Nome:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do funcionário..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">TELEFONE:</label>
                    <input type="tel" class="form-control" name="telefone" placeholder="Seu telefone..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">CPF:</label>
                    <input type="text" class="form-control" name="cpf" placeholder="Seu CPF..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Endereço:</label>
                    <input type="text" class="form-control" name="endereco"
                        placeholder="RUA, BAIRRO, Nº, CIDADE, ESTADO..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cargo:</label>
                    <input type="text" class="form-control" name="cargo" placeholder="Cargo do seu Funcionário..."
                        required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pagamento:</label>
                    <input type="text" class="form-control" name="pagamento"
                        placeholder="Pagamento mensal do Funcionário..." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="nascimento" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data de Prospecção:</label>
                    <input type="date" class="form-control" name="prospeccao" required>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success" name="submit">Salvar</button>
                <a href="funcionario.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>