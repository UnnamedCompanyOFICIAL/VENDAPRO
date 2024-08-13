<?php
// Conexão com o banco de dados
include "db_conn.php";

// Obter o termo de pesquisa
$query = $_GET['query'] ?? '';

if ($query) {
    // Construir a consulta SQL para buscar apenas o usuário pesquisado
    $sql = "SELECT * FROM funcionarios WHERE 
        nome LIKE '%" . $conn->real_escape_string($query) . "%' OR
        telefone LIKE '%" . $conn->real_escape_string($query) . "%' OR
        cpf LIKE '%" . $conn->real_escape_string($query) . "%' OR
        endereco LIKE '%" . $conn->real_escape_string($query) . "%' OR
        cargo LIKE '%" . $conn->real_escape_string($query) . "%' OR
        pagamento LIKE '%" . $conn->real_escape_string($query) . "%' OR
        nascimento LIKE '%" . $conn->real_escape_string($query) . "%' OR
        prospeccao LIKE '%" . $conn->real_escape_string($query) . "%'";
    
    $result = $conn->query($sql);

    // Exibir resultados
    if ($result->num_rows > 0): ?>
<table class="table table-hover text-center">
    <thead class="table-primary">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">CPF</th>
            <th scope="col">ENDEREÇO</th>
            <th scope="col">CARGO</th>
            <th scope="col">PAGAMENTO</th>
            <th scope="col">D. NASCIMENTO</th>
            <th scope="col">D. PROSPECÇÃO</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['Id']); ?></td>
            <td><?php echo htmlspecialchars($row['nome']); ?></td>
            <td><?php echo htmlspecialchars($row['telefone']); ?></td>
            <td><?php echo htmlspecialchars($row['cpf']); ?></td>
            <td><?php echo htmlspecialchars($row['endereco']); ?></td>
            <td><?php echo htmlspecialchars($row['cargo']); ?></td>
            <td><?php echo htmlspecialchars($row['pagamento']); ?></td>
            <td><?php echo date('d/m/Y', strtotime($row['nascimento'])); ?></td>
            <td><?php echo date('d/m/Y', strtotime($row['prospeccao'])); ?></td>
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