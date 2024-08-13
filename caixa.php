<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa de Vendas - SISTEMA PDV</title>
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
    }

    .navbar {
        background-color: #3A5567;
        height: 80px;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-brand {
        font-size: 30px;
        color: #fff;
        display: flex;
        align-items: center;
    }

    h1 {
        font-size: 30px;
        color: #fff;
    }

    .navbar-brand span {
        color: #00F9FF;
    }

    .menu-toggle {
        background-color: #3A5567;
        border: none;
        color: #fff;
        font-size: 20px;
        padding: 5px;
        cursor: pointer;
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

    .container-custom {
        height: 560px;
        border: 5px solid #fff;
        width: 100%;
        max-width: 1270px;
        margin: -50px auto;
        background-color: #3A5567;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    h6 {
        font-size: 50px;
        color: #00F9FF;
        text-align: center;
        margin: 20px 0;
    }

    .card-custom {
        margin-top: 20px;
        height: 100%;
        background-color: #3A556f;
        color: #fff;
        border: none;
        border-radius: 0;
    }

    .card-title {
        color: #fff;
        text-transform: uppercase;
        font-size: 24px;
    }

    .card-title2 {
        text-align: center;
        color: #fff;
        text-transform: uppercase;
        font-size: 24px;
    }

    .search {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .search input {
        height: 38px;
        border-radius: 4px;
        border: 1px solid #ccc;
        flex: 1;
    }

    .form-container input {
        width: 100%;
        height: 38px;
        margin-bottom: 10px;
    }

    .form-container button {
        width: 100%;
    }

    .calculo input,
    .calculo select {
        width: 100%;
        height: 38px;
        margin-bottom: 10px;
    }

    .table-dadosCompra {
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ccc;
    }

    th {
        background-color: #3A5567;
        color: #fff;
        font-size: 12px;
    }

    td {
        color: #fff;
        font-size: 10px;
    }

    /* Garantir que o container3 não permita que o conteúdo ultrapasse seus limites */
    #container3 {
        max-height: 470px;
        /* Define a altura máxima do container */
        overflow-y: auto;
        /* Adiciona rolagem vertical se necessário */
        padding: 10px;
        /* Adiciona espaçamento interno */
        background-color: #3A5567;
        /* Cor de fundo para o container */
    }

    /* Estilo para a tabela dentro do container3 */
    #container3 table {
        width: 90%;
        /* Garante que a tabela ocupe toda a largura do container */
        border-collapse: collapse;
        /* Remove o espaçamento entre as células */
    }

    #container3 th,
    #container3 td {
        padding: 8px;
        /* Adiciona espaçamento interno nas células */
        text-align: center;
        /* Alinha o texto à esquerda */
    }

    /* Adiciona um scroll discreto à tabela, caso seja necessário */
    #container3::-webkit-scrollbar {
        width: 8px;
        /* Largura da barra de rolagem */
    }

    #container3::-webkit-scrollbar-thumb {
        background-color: #00F9FF;
        /* Cor do 'polegar' da barra de rolagem */
        border-radius: 10px;
        /* Arredondamento das bordas do 'polegar' */
    }

    #container3::-webkit-scrollbar-track {
        background-color: transparent;
        /* Cor do fundo da área de rolagem */
    }

    #printReceipt {
        width: 100%;
    }

    /* Media Queries para Responsividade */
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 24px;
        }

        .menu-toggle {
            font-size: 16px;
        }

        .sidebar {
            width: 200px;
        }

        h6 {
            font-size: 36px;
        }

        .card-title,
        .card-title2 {
            font-size: 20px;
        }

        .search input {
            height: 32px;
        }

        .form-container input,
        .calculo input,
        .calculo select {
            height: 32px;
        }

        th,
        td {
            font-size: 10px;
        }
    }

    @media (max-width: 576px) {
        .navbar-brand {
            font-size: 20px;
        }

        .menu-toggle {
            font-size: 14px;
        }

        .sidebar {
            width: 180px;
        }

        h6 {
            font-size: 28px;
        }

        .card-title,
        .card-title2 {
            font-size: 18px;
        }

        .search {
            flex-direction: column;
        }

        .search input {
            width: 100%;
            margin-bottom: 10px;
        }

        .form-container input,
        .calculo input,
        .calculo select {
            height: 28px;
        }

        th,
        td {
            font-size: 8px;
        }

        #container3 table {
            width: 100%;
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
    <nav class="navbar navbar-light">
        <button class="menu-toggle" id="menuToggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path
                    d="M2 3h12a1 1 0 0 1 0 2H2a1 1 0 0 1 0-2zm0 4h12a1 1 0 0 1 0 2H2a1 1 0 0 1 0-2zm0 4h12a1 1 0 0 1 0 2H2a1 1 0 0 1 0-2z" />
            </svg>
        </button>
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-brand">VENDA<span>PRO</span></span>
            <h1>SISTEMA - PDV</h1>
        </div>
    </nav>

    <h6>CAIXA</h6>
    <div class="container-custom">
        <div class="row g-4">
            <!-- Container 1: Informações do Produto -->
            <div class="col-md-4 d-flex flex-column">
                <div class="card card-custom" id="container1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Informações do Produto</h5>
                        <div class="search">
                            <input type="text" id="searchProduct" placeholder="Pesquisar Produto">
                        </div>
                        <div class="form-container">
                            <input type="text" id="productName" placeholder="Nome do Produto" disabled>
                            <input type="text" id="productMark" placeholder="Marca" disabled>
                            <input type="text" id="productForn" placeholder="Fornecedor" disabled>
                            <input type="text" id="productFabr" placeholder="Data de Fabricação" disabled>
                            <input type="text" id="productVenc" placeholder="Data de Validade" disabled>
                            <input type="text" id="productPrice" placeholder="Preço" disabled>
                            <button type="button" class="btn btn-danger" id="clear-btn">Limpar Campos</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container 3: Detalhes da Compra -->
            <div class="col-md-4 d-flex flex-column">
                <div class="card card-custom" id="container3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Cálculo da Venda</h5>
                        <div class="calculo">
                            <input type="number" id="productQuantity" placeholder="Quantidade">
                            <input type="text" id="DESCONTO" placeholder="Desconto% (Opcional)">
                            <input type="text" id="ACRESCIMO" placeholder="A prazozo% (Opcional)">
                            <input type="text" id="PAYMENT" placeholder="Pagamento">
                        </div>
                        <h5 class="card-title text-center">Detalhes da Compra</h5>
                        <div class="form-container">
                            <input type="text" id="totalProducts" placeholder="Total Produtos" readonly disabled>
                            <input type="text" id="SUBTOTAL" placeholder="Subtotal" readonly disabled>
                            <input type="text" id="finalTotal" placeholder="Total Final" readonly disabled>
                            <input type="text" id="TROCO" placeholder="Troco" readonly disabled>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container 3: Carrinho de Compras/Impressão - CUPOM NÃO FISCAL -->
            <div class="col-md-4 d-flex flex-column">
                <div class="card card-custom" id="container3">
                    <div class="card-body">
                        <h5 class="card-title2 text-center">Carrinho de Compras</h5>
                        <div class="table-dadosCompra" id="card3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Marca</th>
                                        <th>Quantidade</th>
                                        <th>Valor</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <!-- As linhas da tabela serão adicionadas aqui pelo JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button id="printReceipt" class="btn btn-primary btn-custom">Imprimir Cupom</button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });

    function updateTotal() {
        const subtotal = parseFloat(document.getElementById('SUBTOTAL').value) || 0;
        const payment = parseFloat(document.getElementById('PAYMENT').value) || 0;
        const desconto = parseFloat(document.getElementById('DESCONTO').value.replace('%', '')) || 0;
        const acrescimo = parseFloat(document.getElementById('ACRESCIMO').value.replace('%', '')) || 0;

        // Calcula o total final considerando desconto e acréscimo
        const descontoDecimal = desconto / 100; // Convertendo desconto para decimal
        const acrescimoDecimal = acrescimo / 100; // Convertendo acréscimo para decimal
        const totalDescontado = subtotal - (subtotal * descontoDecimal);
        const finalTotal = totalDescontado + (totalDescontado * acrescimoDecimal);

        let troco = 0;

        // Verifica se o pagamento é maior que o total final
        if (payment >= finalTotal) {
            // Calcula o troco como a diferença entre o pagamento e o total final
            troco = payment - finalTotal;
        } else {
            // O troco é 0 se o pagamento for menor que o total final
            troco = 0;
        }

        // Atualiza os campos finalTotal e TROCO com os resultados
        document.getElementById('finalTotal').value = finalTotal.toFixed(2);
        document.getElementById('TROCO').value = troco.toFixed(2);
    }

    // Adiciona eventos de input para todos os campos que afetam o total
    document.getElementById('PAYMENT').addEventListener('input', updateTotal);
    document.getElementById('DESCONTO').addEventListener('input', updateTotal);
    document.getElementById('ACRESCIMO').addEventListener('input', updateTotal);

    // Adiciona o evento de blur para formatar os campos DESCONTO e ACRESCIMO como porcentagem
    document.getElementById('DESCONTO').addEventListener('blur', function() {
        formatAsPercentage(this);
    });

    document.getElementById('ACRESCIMO').addEventListener('blur', function() {
        formatAsPercentage(this);
    });

    // Remove o símbolo de porcentagem ao focar nos inputs DESCONTO e ACRESCIMO
    document.getElementById('DESCONTO').addEventListener('focus', function() {
        this.value = this.value.replace('%', '');
    });

    document.getElementById('ACRESCIMO').addEventListener('focus', function() {
        this.value = this.value.replace('%', '');
    });



    document.getElementById('printReceipt').addEventListener('click', function() {
        const tableBody = document.getElementById('tableBody');

        // Remove linhas vazias da tabela
        Array.from(tableBody.children).forEach(row => {
            if (Array.from(row.children).every(cell => !cell.textContent.trim())) {
                row.remove();
            }
        });

        const tableContent = tableBody.innerHTML;
        const totalProducts = document.getElementById('totalProducts').value || '0';
        const SUBTOTAL = document.getElementById('SUBTOTAL').value || '0.00';
        const finalTotal = document.getElementById('finalTotal').value || '0.00';
        const DESCONTO = document.getElementById('DESCONTO').value || '0' + '%';
        const ACRESCIMO = document.getElementById('ACRESCIMO').value || '0' + '%';
        const PAYMENT = document.getElementById('PAYMENT').value || '0.00';
        const TROCO = document.getElementById('TROCO').value || '0.00';

        const printWindow = window.open('', '', 'height=600,width=600');

        printWindow.document.write('<html><head><title>Recibo de Venda</title>');
        printWindow.document.write('<style>');
        printWindow.document.write(
            'body { text-align: left; font-family: Arial, sans-serif; margin: 0; font-size: 9px; }');
        printWindow.document.write('h2 { text-align: left; font-size: 14px; margin-bottom: 5px; }');
        printWindow.document.write('p { text-align: left; font-size: 9px; margin: 2px 0; }');
        printWindow.document.write('table { width: 50%; border-collapse: collapse; margin: 5px; }');
        printWindow.document.write('th, td { border: 0.5px solid black; font-size: 8px; }');
        printWindow.document.write('th { background-color: #f2f2f2; text-transform: uppercase; }');
        printWindow.document.write('header { text-align: lef; margin-bottom: 5px; padding: 1px;}');
        printWindow.document.write('@media print {');
        printWindow.document.write('body { margin: 0; }');
        printWindow.document.write('table { page-break-inside: avoid; }');
        printWindow.document.write('}');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');

        printWindow.document.write('<header>');
        printWindow.document.write('<h2>MINI BOX JERUSALEM</h2>');
        printWindow.document.write('<p><strong>Tel:</strong> (63) 98484-4699</p>');
        printWindow.document.write('<p><strong>CNPJ:</strong> 27.063.069/0001-10</p>');
        printWindow.document.write('</header>');

        printWindow.document.write('<table>');
        printWindow.document.write(
            '<thead><tr><th>PROD</th><th>MARC.</th><th>QUANTI.</th><th>V.U</th><th>S.TOTAL</th></tr></thead>'
        );
        printWindow.document.write('<tbody>');
        printWindow.document.write(tableContent);
        printWindow.document.write('</tbody>');
        printWindow.document.write('</table>');

        printWindow.document.write('<footer>');
        printWindow.document.write('<p><strong>Total de Produtos:</strong> ' + totalProducts + '</p>');
        printWindow.document.write('<p><strong>Subtotal de Produtos:</strong> R$ ' + SUBTOTAL + '</p>');
        printWindow.document.write('<p><strong>Desconto:</strong> ' + DESCONTO + '</p>');
        printWindow.document.write('<p><strong>A prazo:</strong> ' + ACRESCIMO + '</p>');
        printWindow.document.write('<p><strong>Total Final:</strong> R$ ' + finalTotal + '</p>');
        printWindow.document.write('<p><strong>Valor Pago:</strong> R$ ' + PAYMENT + '</p>');
        printWindow.document.write('<p><strong>Troco:</strong> R$ ' + TROCO + '</p>');
        printWindow.document.write('</footer>');

        printWindow.document.write('</body></html>');

        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
    });



    document.addEventListener('DOMContentLoaded', function() {
        // Verifica se há informações de abertura do caixa no localStorage
        var caixaAbertura = localStorage.getItem('caixaAbertura');
        if (caixaAbertura) {
            var info = JSON.parse(caixaAbertura);
            var mensagem = `CAIXA ABERTO\n\nNome: ${info.nome}\nData: ${info.data}\nHora: ${info.hora}`;
            alert(mensagem);

            // Remove a informação de abertura após exibir o alerta
            localStorage.removeItem('caixaAbertura');
        }

        // Verifica se há informações de fechamento do caixa no localStorage
        var caixaFechado = localStorage.getItem('caixaFechado');
        if (caixaFechado) {
            var info = JSON.parse(caixaFechado);
            var mensagem = `CAIXA FECHADO\n\nNome: ${info.nome}\nData: ${info.data}\nHorário: ${info.hora}`;
            alert(mensagem);

            // Remove a informação de fechamento após exibir o alerta
            localStorage.removeItem('caixaFechado');
        }
    });

    function formatAsPercentage(inputElement) {
        setTimeout(() => {
            // Remove caracteres não numéricos, exceto ponto e hífen
            let rawValue = inputElement.value.replace(/[^\d.-]/g, '');

            // Converte o valor para float
            let numericValue = parseFloat(rawValue);

            // Se o valor for numérico, adiciona o símbolo de porcentagem
            if (!isNaN(numericValue)) {
                inputElement.value = numericValue + '%';
            } else {
                inputElement.value = ''; // Limpa o input se não for um número válido
            }
        }, 500); // Atraso de 0.5 segundos
    }

    // Adiciona um evento para formatar o valor como porcentagem ao sair do campo
    document.getElementById('DESCONTO').addEventListener('blur', function() {
        formatAsPercentage(this);
    });

    document.getElementById('ACRESCIMO').addEventListener('blur', function() {
        formatAsPercentage(this);
    });

    // Remove o símbolo de porcentagem ao focar no input para edição
    document.getElementById('DESCONTO').addEventListener('focus', function() {
        this.value = this.value.replace('%', '');
    });

    document.getElementById('ACRESCIMO').addEventListener('focus', function() {
        this.value = this.value.replace('%', '');
    });

    // Função para formatar datas no formato dd/mm/yyyy
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Janeiro é 0
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchProduct').focus();
    });

    let searchTimeout;
    let quantityTimeout;

    // Adiciona o evento de input no campo de busca de produto
    document.getElementById('searchProduct').addEventListener('input', function() {
        var query = this.value;

        clearTimeout(searchTimeout);

        if (query.length > 0) {
            searchTimeout = setTimeout(() => {
                fetch('buscar_produto.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'query=' + encodeURIComponent(query)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            const product = data[0];
                            document.getElementById('productName').value = product.produto || '';
                            document.getElementById('productMark').value = product.marca || '';
                            document.getElementById('productForn').value = product.fornecedor || '';
                            document.getElementById('productFabr').value = product.fabricacao ?
                                formatDate(product.fabricacao) : '';
                            document.getElementById('productVenc').value = product.vencimento ?
                                formatDate(product.vencimento) : '';
                            document.getElementById('productPrice').value = product.valor || '';
                            document.getElementById('productQuantity').value = '1';

                            // Direciona para o campo de quantidade após 0,2s
                            setTimeout(() => {
                                document.getElementById('productQuantity').focus();
                                document.getElementById('productQuantity').select();
                            }, 200);
                        }
                    })
                    .catch(error => console.error('Erro ao buscar produto:', error));
            }, 200); // Espera 0,2 segundos após a última entrada no campo de busca
        }
    });

    // Adiciona o evento de input no campo de quantidade do produto
    document.getElementById('productQuantity').addEventListener('input', function() {
        clearTimeout(quantityTimeout);

        // Espera 2s após a última entrada no campo de quantidade antes de adicionar o produto à tabela
        quantityTimeout = setTimeout(() => {
            addProductToTable();

            // Ativa o botão clear-btn e retorna o foco para o campo de busca após 0,2s
            setTimeout(() => {
                document.getElementById('clear-btn').click();
            }, 200);
        }, 1000);
    });

    // Função para adicionar produto à tabela
    function addProductToTable() {
        const productName = document.getElementById('productName').value;
        const productMark = document.getElementById('productMark').value;
        const productQuantity = parseFloat(document.getElementById('productQuantity').value) || 0;
        const productPrice = parseFloat(document.getElementById('productPrice').value) || 0;
        const subtotal = (productQuantity * productPrice).toFixed(2);

        // Verifica o valor atual do campo SUBTOTAL e soma com o novo valor
        const currentSubtotalValue = parseFloat(document.getElementById('SUBTOTAL').value) || 0;
        const updatedSubtotalValue = (currentSubtotalValue + parseFloat(subtotal)).toFixed(2);

        // Atualiza o campo SUBTOTAL com o valor somado
        document.getElementById('SUBTOTAL').value = updatedSubtotalValue;

        if (productName && productMark && productQuantity > 0 && productPrice > 0) {
            const tableBody = document.getElementById('tableBody');
            const row = document.createElement('tr');

            // Adiciona as células à linha
            const nameCell = document.createElement('td');
            nameCell.textContent = productName;

            const markCell = document.createElement('td');
            markCell.textContent = productMark;

            const quantityCell = document.createElement('td');
            quantityCell.textContent = productQuantity;

            const priceCell = document.createElement('td');
            priceCell.textContent = `R$ ${productPrice.toFixed(2)}`;

            const subtotalCell = document.createElement('td');
            subtotalCell.textContent = `R$ ${subtotal}`;

            // Anexa as células à linha
            row.appendChild(nameCell);
            row.appendChild(markCell);
            row.appendChild(quantityCell);
            row.appendChild(priceCell);
            row.appendChild(subtotalCell);

            // Adiciona a linha ao corpo da tabela
            tableBody.appendChild(row);
        }

        // Atualiza o total de quantidades usando o valor do input
        updateTotalProductQuantity();
    }

    // Função para atualizar a quantidade total de produtos
    function updateTotalProductQuantity() {
        // Obtém o valor do input productQuantity
        const productQuantity = parseFloat(document.getElementById('productQuantity').value) || 0;
        const totalProductsInput = document.getElementById('totalProducts');

        // Verifica o valor atual do campo totalProducts e soma com o novo valor
        const currentTotalProductsValue = parseFloat(totalProductsInput.value) || 0;
        const updatedTotalProductsValue = (currentTotalProductsValue + productQuantity);

        // Atualiza o campo totalProducts com o valor somado
        totalProductsInput.value = updatedTotalProductsValue;
    }

    // Evento para limpar os campos e focar novamente no campo de pesquisa
    document.getElementById('clear-btn').addEventListener('click', function() {
        // Limpa os campos conforme necessário
        // document.getElementById('productName').value = '';
        // document.getElementById('productMark').value = '';
        // document.getElementById('productForn').value = '';
        // document.getElementById('productFabr').value = '';
        // document.getElementById('productVenc').value = '';
        // document.getElementById('productPrice').value = '';
        // document.getElementById('productQuantity').value = '';
        document.getElementById('searchProduct').value = '';

        // Retorna o foco para o campo de pesquisa
        document.getElementById('searchProduct').focus();
    });
    </script>
</body>

</html>