<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $nascimento = $_POST['nascimento'];
    $prospeccao = $_POST['prospeccao'];

    $sql = "INSERT INTO `clientes` (`Id`, `nome`, `email`, `telefone`, `cpf`, `endereco`, `nascimento`, `prospeccao`) VALUES (NULL, '$nome', '$email', '$telefone', '$cpf', ' $endereco', ' $nascimento', ' $prospeccao')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: cliente.php");
    } else {
        echo "Falha: " . mysqli_error($conn);
    }
}
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Carter+One&display=swap');
    </style>
    <title>PHP - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-3"
        style="background-color: #3A5567; color:#fff; font-family: 'Carter one'; padding:15px;">
        SISTEMA - PDV
    </nav>

    <div class="container">
        <div class="text-center mb-3">
            <h3>Novo Cliente</h3>
            <p class="text-muted">
                Complete o formulário abaixo para cadastrar o seu novo Cliente
            </p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width:300px;;">
                <div class="row mb-2">

                    <div class="mb-2" style="display: none;">
                        <label class="form-label"></label>
                        <input type="text" class="form-control" name="Id" placeholder="1...">
                    </div>

                    <div class="col">
                        <label class="form-label">Seu Nome:</label>
                        <input type="text" class="form-control" name="nome" placeholder="Albert...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Seu E-mail:</label>
                        <input type="text" class="form-control" name="email" placeholder="Albert@gmail.com...">
                    </div>

                    <div class="col">
                        <label class="form-label">Seu Telefone:</label>
                        <input type="text" class="form-control" name="telefone" placeholder="(00) 00000-0000...">
                    </div>

                    <div class="col">
                        <label class="form-label">Seu CPF:</label>
                        <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Seu Endereço:</label>
                        <input type="text" class="form-control" name="endereco"
                            placeholder="rua, bairro, nº da casa, cidade, estado">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" name="nascimento" placeholder="10/10/1990">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de Prospecção:</label>
                        <input type="date" class="form-control" name="prospeccao" placeholder="10/10/2010">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Salvar</button>
                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>