<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Fazer Pedido</title>
  <style>
    body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
    .form-box { border: 2px solid #000; display: inline-block; padding: 20px; border-radius: 8px; }
    input, textarea, select { display: block; width: 250px; margin: 10px auto; padding: 8px; }
    textarea { height: 80px; resize: none; }
    button { margin: 5px; padding: 8px 20px; cursor: pointer; }
  </style>
</head>
<body>
  <div class="form-box">
    <h3>Fazer Pedido</h3>
    <form method="POST">
      <select name="cliente_id" required>
        <option value="">Selecione o Cliente</option>
        <?php
          $res = $conn->query("SELECT id, nome FROM clientes ORDER BY nome");
          while($row = $res->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['nome']."</option>";
          }
        ?>
      </select>

      <input type="text" name="produto" placeholder="Produto" required>
      <input type="number" name="quantidade" placeholder="Quantidade" required>
      <textarea name="observacoes" placeholder="Observações"></textarea>

      <div>
        <button type="submit" name="salvar">Salvar</button>
      </div>
    </form>
    <br>
    <button onclick="location.href='index.php'">⬅ Voltar</button>
  </div>

  <?php
  if (isset($_POST['salvar'])) {
      $cliente_id = $_POST['cliente_id'];
      $produto = $_POST['produto'];
      $quantidade = $_POST['quantidade'];
      $observacoes = $_POST['observacoes'];

      $sql = "INSERT INTO pedidos (cliente_id, produto, quantidade, observacoes) 
              VALUES ('$cliente_id', '$produto', '$quantidade', '$observacoes')";

      if ($conn->query($sql) === TRUE) {
          echo "<p style='color:green;'>Pedido salvo com sucesso!</p>";
      } else {
          echo "<p style='color:red;'>Erro: " . $conn->error . "</p>";
      }
  }
  ?>
</body>
</html>
