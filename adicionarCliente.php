<!DOCTYPE html>
<html>

<head>
  <title>Adicionar Cliente</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
  <?php

  include "db_conn.php";
  $id = $_GET['idUsuario'];
  ?>
  <form action="adicionar.php?idUsuario=<?php echo $id ?>" method="post">
    <h2>Adicionar Cliente</h2>
    <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php $_SESSION['error'] = '';
    } ?>

    <label>Name</label>
    <input type="text" name="nome" placeholder="Digite o nome!">
    <br>

    <label>Data Nasc.</label>
    <input type="date" name="data" placeholder="Data de Nascimento"><br>

    <label>CPF</label>
    <input type="text" name="cpf" maxlength="11" placeholder="Digite o CPF!"><br>

    <label>RG</label>
    <input type="text" name="rg"maxlength="9"  placeholder="Digite o RG!"><br>

    <label>Telefone</label>
    <input type="text" id='telefone' name="telefone"  maxlength="11" placeholder="Telefone"><br>

    <a href="home.php">Voltar</a>
    <button type="submit">Salvar</button>
  </form>
</body>
</html>