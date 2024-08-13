<?php
include "db_conn.php";
$Id = $_GET['id'];

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE `fornecedores` SET `nome`='$nome', `email`='$email',`telefone`='$telefone', `cnpj`='$cnpj', `endereco`='$endereco' WHERE `id`='$Id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: fornecedor.php");
    } else {
        echo "Falha ao editar " . mysqli_error($conn);
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
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #3A5567; color:#fff; font-family: 'Carter One'; padding:15px;">
        SISTEMA - PDV
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Editar Informações do Fornecedor</h3>
            <p class="text-muted">
                Clique no botão "Atualizar" para editar as informações do seu Fornecedor
            </p>
        </div>

        <?php
        $sql = "SELECT * FROM `fornecedores` WHERE id = $Id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nome do Fornecedor:</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $row['nome']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">E-mail do Fornecedor:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefone do Fornecedor:</label>
                        <input type="text" class="form-control" name="telefone" value="<?php echo $row['telefone']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">CNPJ do Fornecedor:</label>
                        <input type="text" class="form-control" name="cnpj" value="<?php echo $row['cnpj']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Endereço do Fornecedor:</label>
                        <input type="text" class="form-control" name="endereço" value="<?php echo $row['endereco']; ?>">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                        <a href="fornecedor.php" class="btn btn-danger">Cancelar</a>
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