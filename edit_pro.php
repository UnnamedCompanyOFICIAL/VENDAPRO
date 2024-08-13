<?php
include "db_conn.php";
$Id = $_GET['id'];

if (isset($_POST['submit'])) {
    $produto = $_POST['produto'];
    $marca = $_POST['marca'];
    $fornecedor = $_POST['fornecedor'];
    $codigo = $_POST['codigo'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $fabricacao = $_POST['fabricacao'];
    $vencimento = $_POST['vencimento'];

    $sql = "UPDATE `produtos` SET `produto`='$produto', `marca`='$marca', `fornecedor`='$fornecedor', `codigo`='$codigo', `quantidade`='$quantidade', `valor`='$valor', `fabricacao`='$fabricacao', `vencimento`='$vencimento' WHERE `id`='$Id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: produto.php");
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
    <title>PHP - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap">
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-3"
        style="background-color: #3A5567; color:#fff; font-family: 'Carter One'; padding:15px;">
        SISTEMA - PDV
    </nav>

    <div class="container mt-2">
        <div class="text-center mb-2">
            <h3>Editar Informações do Produto</h3>
            <p class="text-muted">
                Clique no botão "Atualizar" para editar as informações do seu Produto
            </p>
        </div>

        <?php
        $Id = $_GET['id'];
        $sql = "SELECT * FROM `produtos` WHERE id = $Id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width:300px;">
                <div class="mb-3">
                    <label for="produto" class="form-label">Nome do Produto:</label>
                    <input type="text" class="form-control" id="produto" name="produto"
                        value="<?php echo htmlspecialchars($row['produto']); ?>" required>
                </div>
                <div class="col">
                    <label for="marca" class="form-label">Marca do Produto:</label>
                    <input type="text" class="form-control" id="marca" name="marca"
                        value="<?php echo htmlspecialchars($row['marca']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fornecedor" class="form-label">Fornecedor do Produto:</label>
                    <input type="text" class="form-control" id="fornecedor" name="fornecedor"
                        value="<?php echo htmlspecialchars($row['fornecedor']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="codigo" class="form-label">Código e Barras:</label>
                    <input type="text" class="form-control" id="codigo" name="codigo"
                        value="<?php echo htmlspecialchars($row['codigo']); ?>" required>
                </div>
                <div class="col">
                    <label for="quantidade" class="form-label">Quantidade:</label>
                    <input type="text" class="form-control" id="quantidade" name="quantidade"
                        value="<?php echo htmlspecialchars($row['quantidade']); ?>" required>
                </div>
                <div class="col">
                    <label for="valor" class="form-label">Valor do Produto:</label>
                    <input type="text" class="form-control" id="valor" name="valor"
                        value="<?php echo htmlspecialchars($row['valor']); ?>" required>
                </div>
                <div class="col">
                    <label for="fabricacao" class="form-label">Data de Fabricação:</label>
                    <input type="date" class="form-control" id="fabricacao" name="fabricacao"
                        value="<?php echo htmlspecialchars($row['fabricacao']); ?>">
                </div>
                <div class="mb-3">
                    <label for="vencimento" class="form-label">Data de Vencimento:</label>
                    <input type="date" class="form-control" id="vencimento" name="vencimento"
                        value="<?php echo htmlspecialchars($row['vencimento']); ?>">
                </div>

                <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                <a href="produto.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>