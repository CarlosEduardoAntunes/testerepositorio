<?php include "conexao.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Cliente</title>
  <style>
    body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
    .form-box { border: 2px solid #000; display: inline-block; padding: 20px; border-radius: 8px; }
    input { display: block; width: 250px; margin: 10px auto; padding: 8px; }
    button { margin: 5px; padding: 8px 20px; cursor: pointer; }
  </style>
</head>
<body>
  <div class="form-box">
    <h3>Cadastrar Cliente</h3>
    <form method="POST">
      <input type="text" name="nome" placeholder="Nome" required>
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="tel" name="telefone" placeholder="Telefone" required>
      <div>
        <button type="submit" name="salvar">Salvar</button>
      </div>
    </form>
    <br>
    <button onclick="location.href='index.php'">⬅ Voltar</button>
  </div>

  <?php
  if (isset($_POST['salvar'])) {
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];

      $sql = "INSERT INTO clientes (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
      if ($conn->query($sql) === TRUE) {
          echo "<p style='color:green;'>Cliente cadastrado com sucesso!</p>";
      } else {
          echo "<p style='color:red;'>Erro: " . $conn->error . "</p>";
      }
  }
  ?>
</body>
</html>
