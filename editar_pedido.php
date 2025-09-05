<?php 
include "conexao.php"; 
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM pedidos WHERE id=$id");
$pedido = $res->fetch_assoc();

if (isset($_POST['salvar'])) {
  $produto = $_POST['produto'];
  $quantidade = $_POST['quantidade'];
  $observacoes = $_POST['observacoes'];
  $conn->query("UPDATE pedidos SET produto='$produto', quantidade='$quantidade', observacoes='$observacoes' WHERE id=$id");
  header("Location: listagem.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Editar Pedido</title></head>
<body>
  <h3>Editar Pedido</h3>
  <form method="POST">
    <input type="text" name="produto" value="<?= $pedido['produto'] ?>" required><br>
    <input type="number" name="quantidade" value="<?= $pedido['quantidade'] ?>" required><br>
    <textarea name="observacoes"><?= $pedido['observacoes'] ?></textarea><br>
    <button type="submit" name="salvar">Salvar</button>
  </form>
</body>
</html>
    