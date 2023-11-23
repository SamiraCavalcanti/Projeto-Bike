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

// Processar o formulário de adição de produto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $estoque = $_POST["estoque"];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO produtos (nome,descricao,preco, estoque) VALUES ('$nome','$descricao', $preco, $estoque)";
    // ...

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:   #fff;'>Produto adicionado com sucesso!</p>";
    } else {
        echo "<p style='color:   #fff;'>Erro ao adicionar produto: " . $conn->error . "</p>";
    }

    // ...

}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2 class="adicionar-produto">Adicionar Produto</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        Nome: <input type="text" name="nome" required><br>
        Descrição:<input type="text" name="descricao" required><br>
        Preço: <input type="text" name="preco" required><br>
        Estoque: <input type="text" name="estoque" required><br>
        <input type="submit" value="Adicionar Produto">
    </form>
</body>

</html>