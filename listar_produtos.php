<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "web";
$password = "admin1";
$dbname = "produtos_esportivos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consultar os produtos no banco de dados
$sql = "SELECT id, nome,  preco, estoque FROM produtos";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="style_listar.css">
</head>

<body>
    <h2>Listagem de Produtos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
        </tr>
        <?php
        // Exibir os produtos na tabela
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["preco"] . "</td>";
                echo "<td>" . $row["estoque"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum produto encontrado</td></tr>";
        }
        ?>
    </table>
</body>

</html>