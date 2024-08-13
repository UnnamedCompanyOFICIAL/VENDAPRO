<?php
include "db_conn.php";
$Id = $_GET['id'];

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $nascimento = $_POST['nascimento'];
    $prospeccao = $_POST['prospeccao'];

    $sql = "UPDATE `clientes` SET `nome`='$nome',`telefone`='$telefone',`cpf`='$cpf',`endereco`='$endereco',`nascimento`='$nascimento',`prospeccao`='$prospeccao' WHERE `id`='$Id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: cliente.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #3A5567; color:#fff; font-family: 'Carter One'; padding:15px;">
        SISTEMA - PDV
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Editar Informações do Cliente</h3>
            <p class="text-muted">
                Clique no botão "Atualizar" para editar as informações do seu Cliente
            </p>
        </div>

        <?php
        $Id = $_GET['id'];
        $sql = "SELECT * FROM `clientes` WHERE id = $Id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Seu Nome:</label>
                        <input type="text" class="form-control" name="nome"
                            value="<?php echo htmlspecialchars($row['nome']); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefone:</label>
                        <input type="text" class="form-control" name="telefone"
                            value="<?php echo htmlspecialchars($row['telefone']); ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">CPF:</label>
                        <input type="text" class="form-control" name="cpf"
                            value="<?php echo htmlspecialchars($row['cpf']); ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Endereço:</label>
                        <input type="text" class="form-control" name="endereco"
                            value="<?php echo htmlspecialchars($row['endereco']); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" name="nascimento"
                            value="<?php echo htmlspecialchars($row['nascimento']); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data de Prospecção:</label>
                        <input type="date" class="form-control" name="prospeccao"
                            value="<?php echo htmlspecialchars($row['prospeccao']); ?>">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                        <a href="cliente.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>