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

    td {
        text-align: center;
        font-size: 12px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #6c757d;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 30px 0 10px 0;
        vertical-align: middle;
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
        font-size: 18px;
        text-align: center;
        color: #BFB8B8;
        padding: 10px 15px;
        text-decoration: none;
        display: block;
        font-family: 'Carter One', cursive;
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
            <input type="text" class="form-control" id="query" name="query" placeholder="Pesquisar Fornecedores...">
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
                        <th scope="col">FORNECEDOR</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">TELEFONE</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">ENDEREÇO</th>
                        <th scope="col">
                            <a href="add_for.php" class="btn-new mb-3"><i>Novo Fornecedor</i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php";

                    if ($conn->connect_error) {
                        die("Erro na conexão: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM fornecedores";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Verificar e formatar os valores
                            $nome = !empty($row['nome']) ? htmlspecialchars($row['nome']) : 'XXX';
                            $email = !empty($row['email']) ? htmlspecialchars($row['email']) : 'XXX';

                            // Formatar telefone
                            $telefone = !empty($row['telefone']) ? $row['telefone'] : 'XXX';
                            $telefoneFormatado = $telefone === 'XXX' ? 'XXX' : preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);

                            // Formatar CNPJ
                            $cnpj = !empty($row['cnpj']) ? $row['cnpj'] : 'XXX';
                            $cnpjFormatado = $cnpj === 'XXX' ? 'XXX' : preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj);

                            $endereco = !empty($row['endereco']) ? htmlspecialchars($row['endereco']) : 'XXX';
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Id']); ?></td>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $telefoneFormatado; ?></td>
                        <td><?php echo $cnpjFormatado; ?></td>
                        <td><?php echo $endereco; ?></td>
                        <td>
                            <a href="edit_for.php?id=<?php echo urlencode($row['Id']); ?>"
                                class="btn btn-warning">EDITAR</a>
                            <form class="d-inline delete-form" method="post" action="delet_for.php">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['Id']); ?>">
                                <button type="submit" class="btn btn-danger btn-delete">DELETAR</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center no-results'>Nenhum Fornecedor encontrado.</td></tr>";
                    }

                    $conn->close();
                    ?>




                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var query = document.getElementById('query').value;
        var searchResults = document.getElementById('searchResults');
        var originalTableContainer = document.getElementById('originalTableContainer');

        originalTableContainer.style.display = 'none';
        searchResults.style.display = 'block';

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'search_for.php?query=' + encodeURIComponent(query), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    searchResults.innerHTML = xhr.responseText;
                } else {
                    console.error('Erro ao buscar os dados.');
                }
            }
        };
        xhr.send();
    });

    document.addEventListener('click', function(event) {
        var searchForm = document.getElementById('searchForm');
        var searchResults = document.getElementById('searchResults');
        var sidebar = document.getElementById('sidebar');
        var menuToggle = document.getElementById('menuToggle');

        if (!searchForm.contains(event.target) && !searchResults.contains(event.target) && !sidebar.contains(
                event.target)) {
            document.getElementById('originalTableContainer').style.display = 'block';
            searchResults.style.display = 'none';
        }

        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target) && sidebar.classList.contains(
                'show')) {
            sidebar.classList.remove('show');
        }

        if (event.target.classList.contains('btn-delete')) {
            if (!confirm('Tem certeza de que deseja excluir este Fornecedor?')) {
                event.preventDefault();
            }
        }
    });

    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });
    </script>
</body>

</html>