<?php
// Conexão com o banco de dados
include "db_conn.php";

// Obter o termo de pesquisa
$query = $_GET['query'] ?? '';

if ($query) {
    // Construir a consulta SQL para buscar apenas o usuário pesquisado
    $sql = "SELECT * FROM fornecedores WHERE 
        nome LIKE '%" . $conn->real_escape_string($query) . "%' OR
        telefone LIKE '%" . $conn->real_escape_string($query) . "%' OR
        cnpj LIKE '%" . $conn->real_escape_string($query) . "%' OR
        endereco LIKE '%" . $conn->real_escape_string($query) . "%'";
    
    $result = $conn->query($sql);

    // Exibir resultados
    if ($result->num_rows > 0): ?>
<table class="table table-hover text-center">
    <thead class="table-primary">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">FORNECEDOR</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">CNPJ</th>
            <th scope="col">ENDEREÇO</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['Id']); ?></td>
            <td><?php echo htmlspecialchars($row['nome']); ?></td>
            <td><?php echo htmlspecialchars($row['telefone']); ?></td>
            <td><?php echo htmlspecialchars($row['cnpj']); ?></td>
            <td><?php echo htmlspecialchars($row['endereco']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
<p class="text-center" style="font-family: 'Carter One', cursive;">Nenhum resultado encontrado.</p>
<?php endif;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>