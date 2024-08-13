<?php
// Conexão com o banco de dados
include "db_conn.php";

// Obter o termo de pesquisa
$query = $_GET['query'] ?? '';

if ($query) {
    // Construir a consulta SQL para buscar apenas o produto pesquisado
    $sql = "SELECT * FROM produtos WHERE 
        produto LIKE ? OR
        marca LIKE ? OR
        fornecedor LIKE ? OR
        codigo LIKE ? OR
        quantidade LIKE ? OR
        valor LIKE ? OR
        fabricacao LIKE ? OR
        vencimento LIKE ?";
    
    // Preparar e executar a consulta
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $conn->real_escape_string($query) . '%';
    $stmt->bind_param('ssssssss', $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Exibir resultados
    if ($result->num_rows > 0): ?>
<table class="table table-hover text-center">
    <thead class="table-primary">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">PRODUTOS</th>
            <th scope="col">MARCA</th>
            <th scope="col">FORNECEDOR</th>
            <th scope="col">CÓDIGO</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col">VALOR</th>
            <th scope="col">D. FABRICAÇÃO</th>
            <th scope="col">D. VENCIMENTO</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['Id']); ?></td>
            <td><?php echo htmlspecialchars($row['produto']); ?></td>
            <td><?php echo htmlspecialchars($row['marca']); ?></td>
            <td><?php echo htmlspecialchars($row['fornecedor']); ?></td>
            <td><?php echo htmlspecialchars($row['codigo']); ?></td>
            <td><?php echo htmlspecialchars($row['quantidade']); ?></td>
            <td><?php echo htmlspecialchars($row['valor']); ?></td>
            <td><?php echo date('d/m/Y', strtotime($row['fabricacao'])); ?></td>
            <td><?php echo date('d/m/Y', strtotime($row['vencimento'])); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
<p class="text-center" style="font-family: 'Carter One', cursive;">Nenhum resultado encontrado.</p>
<?php endif;

    // Fechar a declaração
    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>