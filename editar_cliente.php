<?php 
include "conexao.php"; 
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM clientes WHERE id=$id");
$cliente = $res->fetch_assoc();

if (isset($_POST['salvar'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $conn->query("UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone' WHERE id=$id");
  header("Location: listagem.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Editar Cliente</title></head>
<body>
  <h3>Editar Cliente</h3>
  <form method="POST">
    <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required><br>
    <input type="email" name="email" value="<?= $cliente['email'] ?>" required><br>
    <input type="tel" name="telefone" value="<?= $cliente['telefone'] ?>" required><br>
    <button type="submit" name="salvar">Salvar</button>
  </form>
</body>
</html>
            