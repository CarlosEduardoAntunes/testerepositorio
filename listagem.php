<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Listagem</title>
  <style>
    body { font-family: Arial, sans-serif; text-align: center; margin: 20px; }
    .tabs { margin-bottom: 20px; }
    .tab-btn { padding: 10px 20px; cursor: pointer; border: 1px solid #000; background: #f1f1f1; margin-right: 5px; }
    .tab-btn.active { background: #ddd; }
    .tab-content { display: none; }
    table { border-collapse: collapse; margin: 20px auto; width: 80%; }
    th, td { border: 1px solid #000; padding: 10px; text-align: center; }
    a { margin: 0 5px; text-decoration: none; }
    .btn { padding: 5px 10px; border: 1px solid #000; background: #eee; }
    .btn:hover { background: #ddd; }
    .back-btn { margin-top: 20px; padding: 10px 20px; border: 1px solid #000; background: #f1f1f1; cursor: pointer; }
    .back-btn:hover { background: #ddd; }
  </style>
  <script>
    function openTab(tabName) {
      document.querySelectorAll(".tab-content").forEach(div => div.style.display = "none");
      document.querySelectorAll(".tab-btn").forEach(btn => btn.classList.remove("active"));
      document.getElementById(tabName).style.display = "block";
      document.getElementById("btn-" + tabName).classList.add("active");
    }
    window.onload = () => openTab('clientes');
  </script>
</head>
<body>
  <h2>Listagem de Dados</h2>
  <div class="tabs">
    <button class="tab-btn" id="btn-clientes" onclick="openTab('clientes')">Clientes</button>
    <button class="tab-btn" id="btn-pedidos" onclick="openTab('pedidos')">Pedidos</button>
  </div>

  <!-- Clientes -->
  <div id="clientes" class="tab-content">
    <h3>Clientes</h3>
    <table>
      <tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>
      <?php
        $res = $conn->query("SELECT * FROM clientes");
        while($row = $res->fetch_assoc()) {
          echo "<tr>
                  <td>".$row['id']."</td>
                  <td>".$row['nome']."</td>
                  <td>".$row['email']."</td>
                  <td>".$row['telefone']."</td>
                  <td>
                    <a class='btn' href='editar_cliente.php?id=".$row['id']."'>Editar</a>
                    <a class='btn' href='excluir_cliente.php?id=".$row['id']."' onclick=\"return confirm('Excluir cliente?')\">Excluir</a>
                  </td>
                </tr>";
        }
      ?>
    </table>
  </div>

  <!-- Pedidos -->
  <div id="pedidos" class="tab-content">
    <h3>Pedidos</h3>
    <table>
      <tr><th>ID</th><th>Cliente</th><th>Produto</th><th>Quantidade</th><th>Observações</th><th>Data</th><th>Ações</th></tr>
      <?php
        $sql = "SELECT p.id, c.nome AS cliente, p.produto, p.quantidade, p.observacoes, p.data_pedido 
                FROM pedidos p JOIN clientes c ON p.cliente_id = c.id ORDER BY p.id DESC";
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()) {
          echo "<tr>
                  <td>".$row['id']."</td>
                  <td>".$row['cliente']."</td>
                  <td>".$row['produto']."</td>
                  <td>".$row['quantidade']."</td>
                  <td>".$row['observacoes']."</td>
                  <td>".$row['data_pedido']."</td>
                  <td>
                    <a class='btn' href='editar_pedido.php?id=".$row['id']."'>Editar</a>
                    <a class='btn' href='excluir_pedido.php?id=".$row['id']."' onclick=\"return confirm('Excluir pedido?')\">Excluir</a>
                  </td>
                </tr>";
        }
      ?>
    </table>
  </div>

  <!-- Botão de voltar -->
  <button class="back-btn" onclick="location.href='index.php'">⬅ Voltar</button>
</body>
</html>
          