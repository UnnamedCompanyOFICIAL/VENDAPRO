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
        background-color: #486F8A;
        color: #fff;
    }

    .navbar {
        background-color: #3A5567;
        height: 80px;
        position: relative;
        z-index: 1000;
        margin: 0;
        padding: 0;
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

    .navbar h1 {
        font-size: 30px;
        color: #fff;
        margin: 0;
        text-align: center;
        flex-grow: 1;
        margin-left: -1300px;
    }

    .container-custom {
        border: 5px solid #fff;
        width: 1100px;
        height: 570px;
        background-color: #3A5567;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    .card,
    .card-1 {
        background-color: #fff;
        height: 200px;
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        overflow: hidden;
        position: relative;
        border-radius: 0;
    }

    .card img,
    .card-1 img {
        height: 150px;
        width: auto;
        margin-bottom: 10px;
        transition: transform 0.3s ease;
    }

    .card:hover img,
    .card-1:hover img {
        transform: scale(1.1);
    }

    .card-large img {
        height: 220px;
    }

    .card-large:hover img {
        transform: scale(1.1);
    }

    .card-text {
        text-align: center;
        font-family: 'Carter One', cursive;
    }

    .card-text a {
        display: block;
        font-family: 'Carter One', cursive;
        border-radius: 0;
        padding: 10px;
        color: #fff;
        background-color: #416680;
        transition: all 0.3s ease;
        text-decoration: none;
        width: 100%;
        text-align: center;
        border: none;
        text-transform: uppercase;
        font-size: 20px;
    }

    .card-text a:hover {
        background-color: #fff;
        color: #164862;
        transform: scale(1.1);
    }
    </style>
</head>

<body>
    <!-- Menu Lateral -->
    <div class="sidebar" id="sidebar">
        <a href="inicio.php">Início</a>
        <a href="caixa.php">Caixa</a>
        <a href="index.php">Clientes</a>
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

    <!-- Container Branco -->
    <div class="container d-flex justify-content-center">
        <div class="container-custom">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <a href="#" id="openCaixaLink1">
                        <div class="card card-large">
                            <img src="CAIXA-removebg-preview.png" alt="Caixa">
                        </div>
                    </a>
                    <div class="card-text">
                        <a href="#" id="openCaixaLink2">Caixa</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="cliente.php">
                        <div class="card card-large">
                            <img src="CONTAS-removebg-preview.png" alt="Clientes">
                        </div>
                    </a>
                    <div class="card-text">
                        <a href="cliente.php">Clientes</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="produto.php">
                        <div class="card card-large">
                            <img src="PRODUTOS-removebg-preview.png" alt="Produtos">
                        </div>
                    </a>
                    <div class="card-text">
                        <a href="produto.php">Produtos</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="funcionario.php">
                        <div class="card-1">
                            <img src="ESTOQUEMAN-removebg-preview.png" alt="Funcionarios">
                        </div>
                    </a>
                    <div class="card-text">
                        <a href="funcionario.php">Funcionários</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="fornecedor.php">
                        <div class="card-1">
                            <img src="FORNECEDOR-removebg-preview.png" alt="Fornecedores">
                        </div>
                    </a>
                    <div class="card-text">
                        <a href="fornecedor.php">Fornecedores</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="estoque.php">
                        <div class="card-1">
                            <img src="ESTOQUE-removebg-preview.png" alt="Estoque">
                        </div>
                    </a>
                    <div class="card-text">
                        <a href="estoque.php">Estoque</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function abrirCaixa(event) {
        event.preventDefault();
        var nome = prompt("Digite seu nome:");
        var senha = prompt("Digite sua senha:");

        if (nome && senha) {
            if (senha === "admin") {
                localStorage.setItem('caixaAberto', 'true');
                localStorage.setItem('nomeUsuario', nome); // Armazena o nome do usuário

                // Obtém a data e hora atuais
                const now = new Date();
                const dateString = now.toLocaleDateString('pt-BR');
                const timeString = now.toLocaleTimeString('pt-BR');

                // Armazena informações de abertura no localStorage
                localStorage.setItem('caixaAbertura', JSON.stringify({
                    nome: nome,
                    data: dateString,
                    hora: timeString
                }));

                localStorage.removeItem('caixaFechado');
                alert(`Caixa aberto por ${nome}.`);
                // Redireciona para caixa.php após um breve atraso
                setTimeout(function() {
                    window.location.href = 'caixa.php';
                }, 500); // 500 ms de atraso
            } else {
                alert("Senha incorreta.");
            }
        } else {
            alert("Por favor, preencha todos os campos.");
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('openCaixaLink1').addEventListener('click', abrirCaixa);
        document.getElementById('openCaixaLink2').addEventListener('click', abrirCaixa);
    });

    // Verifica se a flag indica que a caixa foi fechada
    window.onload = function() {
        if (localStorage.getItem('caixaFechado') === 'true') {
            // Exibe um alerta com a mensagem "CAIXA FECHADO" em negrito
            alert('CAIXA FECHADO');
            // Remove a flag após mostrar a mensagem
            localStorage.removeItem('caixaFechado');
        }
    };

    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });
    </script>
</body>

</html>