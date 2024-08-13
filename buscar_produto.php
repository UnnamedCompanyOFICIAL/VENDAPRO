<?php
include 'db_conn.php'; // Inclua a conexão com o banco de dados

// Verifica se a consulta foi enviada via POST
$query = $_POST['query'] ?? '';
$sql = "SELECT * FROM produtos WHERE produto LIKE ? OR codigo LIKE ?";
$stmt = $conn->prepare($sql);
$likeQuery = "%$query%";
$stmt->bind_param('ss', $likeQuery, $likeQuery);
$stmt->execute();
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);

// Retorna os produtos encontrados como JSON
echo json_encode($products);

$stmt->close();
$conn->close();
