<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTES - VENDAPRO</title>
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
        font-size: 10px;
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
        width: 100px;
        color: #000;
        border: 2px solid #3A5567;
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

    .navbar {
        height: 80px;
        position: relative;
        z-index: 1000;
        margin: 0;
        background-color: #3A5567;
    }

    .navbar-brand {
        font-size: 30px;
        color: #fff;
        flex-grow: 1;
        text-align: left;
        display: flex;
        align-items: center;
    }

    .navbar-brand span {
        color: #00F9FF;
        /* Cor ciano */
    }

    .table-container {
        margin-top: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .table-primary {
        background-color: #3A5567;
        width: 100%;
        max-width: 700px;
        border-collapse: collapse;
    }

    #searchResults {
        display: none;
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
        background-color: #343a40;
        color: #fff;
        font-size: 16px;
    }

    .navbar h1 {
        font-size: 30px;
        color: #fff;
        margin: 0;
        text-align: center;
        flex-grow: 1;
        margin-left: -1300px;
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
            <div class="d-flex w-100 justify-content-between align-items-center">
                <span class="navbar-brand mb-0">VENDA<span>PRO</span></span>
                <h1>SISTEMA - PDV</h1>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <form id="searchForm" class="input-group mb-3">
            <input type="text" class="form-control" id="query" name="query" placeholder="Pesquisar Clientes...">
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
                        <th scope="col">NOME</th>
                        <th scope="col">E-MAIL</th>
                        <th scope="col">TELEFONE</th>
                        <th scope="col">CPF</th>
                        <th scope="col">ENDEREÇO</th>
                        <th scope="col">D. NASCIMENTO</th>
                        <th scope="col">D. PROSPECÇÃO</th>
                        <th scope="col">
                            <a href="add_cli.php" class="btn-new mb-3"><i>Novo Cliente</i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php"; // Inclui o arquivo de conexão com o banco de dados

                    // Executa a consulta SQL para selecionar todos os clientes
                    $sql = "SELECT * FROM clientes";
                    $result = $conn->query($sql);

                    // Verifica se há resultados e exibe na tabela
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Usa o operador de coalescência nula para evitar "Undefined array key"
                            $Id = isset($row["Id"]) ? $row["Id"] : 'N/A';
                            $nome = isset($row["nome"]) ? $row["nome"] : 'N/A';
                            $email = isset($row["email"]) ? $row["email"] : 'N/A';
                            $telefone = isset($row["telefone"]) ? $row["telefone"] : 'N/A';
                            $cpf = isset($row["cpf"]) ? $row["cpf"] : 'N/A';
                            $endereco = isset($row["endereco"]) ? $row["endereco"] : 'N/A';

                            // Formatar datas de nascimento e prospecção para dd/mm/yyyy
                            $nascimento = isset($row["nascimento"]) ? DateTime::createFromFormat('Y-m-d', $row["nascimento"])->format('d/m/Y') : 'N/A';
                            $prospeccao = isset($row["prospeccao"]) ? DateTime::createFromFormat('Y-m-d', $row["prospeccao"])->format('d/m/Y') : 'N/A';

                            echo "<tr>";
                            echo "<td>$Id</td>";
                            echo "<td>$nome</td>";
                            echo "<td>$email</td>";
                            echo "<td>$telefone</td>";
                            echo "<td>$cpf</td>";
                            echo "<td>$endereco</td>";
                            echo "<td>$nascimento</td>";
                            echo "<td>$prospeccao</td>";
                            echo "<td>
            <a href='edit_cli.php?id=$Id' class='btn btn-secondary btn-sm'>Editar</a>
            <a href='delet_cli.php?id=$Id' class='btn btn-danger btn-sm'>Excluir</a>
          </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='no-results'>Nenhum cliente encontrado</td></tr>";
                    }

                    // Fecha a conexão com o banco de dados
                    $conn->close();
                    ?>


                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9a9X1A1A5h9jLfe4jkrH5jzj0j3BB3fI8WeuM6Hfb6aI/E87D+o" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-1RPO9b3lK7g4gxW3mU5e1VGR6KtU8lC1+Y+Bm/8wGfokNMP6pZb2VI7jjs65Mmc2" crossorigin="anonymous">
    </script>
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

    // Lógica para pesquisa de clientes
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var query = document.getElementById('query').value;
        var resultsContainer = document.getElementById('searchResults');
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'search_clientes.php?query=' + encodeURIComponent(query), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                resultsContainer.innerHTML = xhr.responseText;
                resultsContainer.style.display = 'block';
            } else {
                resultsContainer.innerHTML = '<p>Erro ao buscar resultados.</p>';
            }
        };
        xhr.send();
    });
    </script>
</body>

</html>