<?php
include "db_conn.php";

// Verifica se a conexão com o banco de dados foi bem-sucedida
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Handle form submission for adding new stock
if (isset($_POST['submit'])) {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);

    $sql = "INSERT INTO estoques (nome, tipo, quantidade) VALUES ('$nome', '$tipo', '$quantidade')";

    if (mysqli_query($conn, $sql)) {
        header("Location: estoque.php");
        exit();
    } else {
        echo "Falha ao adicionar: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA - PDV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Carter+One&family=Archivo+Black&family=Poppins:wght@300;400;700&display=swap">
    <style>
    body {
        background-color: #416680;
        font-family: 'Carter One', cursive;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        position: relative;
    }

    .sidebar {
        position: absolute;
        top: 80px;
        left: 0;
        height: calc(100vh - 80px);
        width: 250px;
        background-color: #3A5567;
        padding-top: 20px;
        transition: all 0.3s ease;
        transform: translateX(-100%);
        z-index: 1050;
        text-align: center;
    }

    .sidebar.show {
        transform: translateX(0);
    }

    .sidebar a {
        color: #BFB8B8;
        padding: 10px 15px;
        text-decoration: none;
        display: block;
        font-family: 'Carter One', cursive;
        text-transform: uppercase;
    }

    .sidebar a:hover {
        background-color: #416680;
        color: #fff;
    }

    .navbar {
        height: 80px;
        position: relative;
        z-index: 1000;
        margin: 0;
        background-color: #3A5567;
    }

    .navbar-brand {
        font-size: 20px;
        color: #fff;
        flex-grow: 1;
        text-align: center;
    }

    .menu-toggle {
        position: absolute;
        top: 50%;
        left: 20px;
        transform: translateY(-50%);
        background-color: #3A5567;
        border: none;
        color: #fff;
        font-size: 20px;
        padding: 5px;
        cursor: pointer;
        z-index: 1051;
    }

    .main-container {
        display: flex;
        gap: 5px;
        margin-left: 100px;
    }

    .container-custom {
        margin-top: 8px;
        border: 5px solid #fff;
        max-width: 1150px;
        width: calc(60% - 50px);
        background-color: #3A5567;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: #fff;
        overflow: hidden;
    }

    .container-secondary {
        margin-top: 8px;
        width: 400px;
        background-color: #3A5567;
        border: 5px solid #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: #fff;
        height: calc(100% - 10px);
    }

    .text-center {
        text-align: center;
    }

    .card-body {
        padding: 10px;
    }

    h3 {
        text-align: center;
        margin-bottom: 0;
    }

    form {
        margin-top: 0;
    }

    .table-container {
        max-height: 300px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #6c757d transparent;
    }

    .table-container::-webkit-scrollbar {
        width: 8px;
    }

    .table-container::-webkit-scrollbar-thumb {
        background-color: #6c757d;
        border-radius: 4px;
    }

    .table-container::-webkit-scrollbar-track {
        background: transparent;
    }

    #originalTableContainer {
        font-size: 14px;
        color: #495057;
    }

    @media (max-width: 768px) {
        .main-container {
            flex-direction: column;
            margin-left: 0;
        }

        .container-custom,
        .container-secondary {
            width: 100%;
        }

        form {
            width: 100%;
        }

        .navbar {
            height: auto;
        }

        .navbar-brand {
            font-size: 16px;
        }

        .btn {
            font-family: 'Carter One', cursive;
            border-radius: 0;
            width: 100px;
            color: #000;
            border: 2px solid #212529;
            background-color: #fff;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #212529;
            color: #fff;
            border: 2px solid #fff;
            transform: scale(1.1);
        }
    }
    </style>
</head>

<body>
    <!-- Menu Lateral -->
    <div class="sidebar" id="sidebar">
        <a href="inicio.php">Início</a>
        <a href="caixa.php">Caixa</a>
        <a href="cliente.php">Clientes</a>
        <a href="produto.php">Produtos</a>
        <a href="funcionario.php">Funcionários</a>
        <a href="fornecedor.php">Fornecedores</a>
        <a href="estoque.php">Estoque</a>
        <a href="configuracoes.php">Configurações</a>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-light mb-0">
        <div class="container">
            <button class="menu-toggle" id="menuToggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path
                        d="M2 3h12a1 1 0 0 1 0 2H2a1 1 0 0 1 0-2zm0 4h12a1 1 0 0 1 0 2H2a1 1 0 0 1 0-2zm0 4h12a1 1 0 0 1 0 2H2a1 1 0 0 1 0-2z" />
                </svg>
            </button>
            <span class="navbar-brand mb-0 h1">SISTEMA - PDV</span>
        </div>
    </nav>

    <!-- Container Principal -->
    <div class="container d-flex justify-content-center">
        <div class="main-container d-flex">
            <div class="container-custom">
                <div class="text-center mb-0">
                    <h3>CONTROLE DE ESTOQUE</h3>
                </div>

                <!-- Formulário de Adição de Estoque -->
                <div class="d-flex justify-content-center">
                    <form action="" method="post" style="width: 100%; max-width: 600px;">
                        <div class="row mb-0">
                            <div class="col">
                                <label class="form-label">Nome do Produto:</label>
                                <input type="text" class="form-control" name="nome" required>
                            </div>

                            <div class="col">
                                <label class="form-label">Tipo:</label>
                                <select class="form-select" name="tipo">
                                    <option value="entrada">Entrada</option>
                                    <option value="saida">Saída</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Quantidade:</label>
                            <input type="number" class="form-control" name="quantidade" required>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success" name="submit">Salvar</button>
                            <a href="estoque.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>

                <!-- Exibição de Registros de Estoque em Card -->
                <div class="mt-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">REGISTRO DE ESTOQUE</h5>
                        <div class="table-container">
                            <?php
                            $sql = "SELECT * FROM estoques";
                            $result = mysqli_query($conn, $sql);

                            if (!$result) {
                                die("Erro ao buscar registros: " . mysqli_error($conn));
                            }
                            ?>

                            <table class="table table-primary table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome do Produto</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Data do Movimento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "
                                            <tr>
                                                <th scope='row'>" . htmlspecialchars($row['id']) . "</th>
                                                <td>" . htmlspecialchars($row['nome']) . "</td>
                                                <td>" . htmlspecialchars($row['tipo']) . "</td>
                                                <td>" . htmlspecialchars($row['quantidade']) . "</td>
                                                <td>" . htmlspecialchars($row['data_movimento']) . "</td>
                                            </tr>
                                            ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Novo Container Secundário -->
            <div class="container-secondary">
                <!-- Conteúdo do segundo container -->
                <div class="text-center">
                    <div class="container mt-5">
                        <form id="searchForm" class="input-group mb-3">
                            <input type="text" class="form-control" id="query" name="query"
                                placeholder="Pesquisar Produtos...">
                            <button type="submit" class="btn btn-primary">BUSCAR</button>
                        </form>
                        <div id="originalTableContainer" class="table-container">
                            <table id="originalTable" class="table table-hover text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">PRODUTO</th>
                                        <th scope="col">CÓDIGO</th>
                                        <th scope="col">QUANTIDADE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    include "db_conn.php";

                    // Verifica se a conexão foi estabelecida
                    if ($conn->connect_error) {
                        die("Erro na conexão: " . $conn->connect_error);
                    }

                    // Consulta todos os produtos
                    $sql = "SELECT * FROM produtos";
                    $result = $conn->query($sql);

                    // Verifica se há resultados
                    if ($result->num_rows > 0) {
                        // Loop pelos resultados e exibe cada produto
                        while ($row = $result->fetch_assoc()) {
                    ?>
                                    <td><?php echo htmlspecialchars($row['Id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['produto']); ?></td>
                                    <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                                    <td><?php echo htmlspecialchars($row['quantidade']); ?></td>
                                    </tr>
                                    <?php
                        }
                    } else {
                    ?>
                                    <tr>
                                        <td colspan="10" class="no-products">Nenhum produto encontrado</td>
                                    </tr>
                                    <?php
                    }

                    // Fecha a conexão
                    $conn->close();
                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });

    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menuToggle');
        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('show');
        }
    });
    </script>
</body>

</html>