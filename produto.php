<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    th {
        color: #00F9FF;
    }

    .table thead {
        background-color: #3A5567;
    }

    td {
        text-align: center;
        font-size: 12px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #6c757d;
        /* Cor cinza para as fontes das células */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 30px 0 10px 0;
        vertical-align: middle;
        /* Ajusta o alinhamento vertical */
    }

    a {
        text-decoration: none;
    }

    .btn-new {
        font-family: 'Carter One', cursive;
        border-radius: 0;
        padding: 5px;
        width: 140px;
        color: #000;
        background-color: #fff;
        transition: all 0.3s ease;
    }

    .btn-new:hover {
        background-color: #3A5567;
        color: #fff;
        border: 2px solid #fff;
        transform: scale(1.1);
    }

    .btn {
        font-family: 'Carter One', cursive;
        border-radius: 0;
        padding: 5px;
        width: 100px;
        color: #000;
        border: 2px solid #3A5567;
        background-color: #fff;
        transition: all 0.3s ease;
    }

    .btn:hover {
        background-color: #3A5567;
        color: #fff;
        border: 2px solid #fff;
        transform: scale(1.1);
    }

    #searchResults {
        display: none;
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

    .table-container {
        margin-top: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .table {
        width: 100%;
        max-width: 700px;
        border-collapse: collapse;
    }

    .sidebar {
        text-align: center;
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
        background-color: #486F8A;
        color: #fff;
    }

    .content {
        padding: 20px;
        transition: margin-left 0.3s ease;
        z-index: 100;
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

    .no-results {
        background-color: #416680;
        background-color: #343a40;
        color: #fff;
        font-size: 16px;
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
        <a href="configurações.php">Configurações</a>
    </div>

    <nav class="navbar navbar-light mb-5">
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

    <div class="container mt-5">
        <form id="searchForm" class="input-group mb-3">
            <input type="text" class="form-control" id="query" name="query" placeholder="Pesquisar Produtos...">
            <button type="submit" class="btn btn-primary">BUSCAR</button>
        </form>
        <div id="searchResults">
            <!-- Resultados da pesquisa aparecerão aqui -->
        </div>

        <div id="originalTableContainer" class="table-container">
            <table id="originalTable" class="table table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUTO</th>
                        <th scope="col">MARCA</th>
                        <th scope="col">FORNECEDOR</th>
                        <th scope="col">CÓDIGO</th>
                        <th scope="col">QUANTIDADE</th>
                        <th scope="col">VALOR</th>
                        <th scope="col">D. FABRICAÇÃO</th>
                        <th scope="col">D. VENCIMENTO</th>
                        <th scope="col">
                            <a href="add_pro.php" class="btn-new mb-3"><i>Novo Produto</i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php";

                    if ($conn->connect_error) {
                        die("Erro na conexão: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM produtos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $fabricacao = date('d/m/Y', strtotime($row['fabricacao']));
                            $vencimento = date('d/m/Y', strtotime($row['vencimento']));
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Id']); ?></td>
                        <td><?php echo htmlspecialchars($row['produto']); ?></td>
                        <td>@ <?php echo htmlspecialchars($row['marca']); ?></td>
                        <td><?php echo htmlspecialchars($row['fornecedor']); ?></td>
                        <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantidade']); ?> - ITENS</td>
                        <td>R$ <?php echo htmlspecialchars($row['valor']); ?></td>
                        <td><?php echo htmlspecialchars($fabricacao); ?></td>
                        <td><?php echo htmlspecialchars($vencimento); ?></td>
                        <td>
                            <a href="edit_pro.php?id=<?php echo $row['Id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="remove_pro.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr class='no-results'><td colspan='10'>Nenhum produto encontrado.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    document.getElementById('menuToggle').addEventListener('click', function(event) {
        event.stopPropagation();
        document.getElementById('sidebar').classList.toggle('show');
    });

    document.addEventListener('click', function(event) {
        var sidebar = document.getElementById('sidebar');
        var menuToggle = document.getElementById('menuToggle');

        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
            sidebar.classList.remove('show');
        }
    });

    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var query = document.getElementById('query').value.trim();

        if (query === "") {
            alert("Por favor, insira um termo de pesquisa.");
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "produto.php?query=" + query, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                document.getElementById('searchResults').innerHTML = response;
                document.getElementById('searchResults').style.display = 'block';
                document.getElementById('originalTableContainer').style.display = 'none';
            }
        };
        xhr.send();
    });

    document.getElementById('searchForm').addEventListener('reset', function() {
        document.getElementById('searchResults').style.display = 'none';
        document.getElementById('originalTableContainer').style.display = 'block';
    });
    </script>
</body>

</html>