<!DOCTYPE html>
<html>

<head>
  <title>Editar Cliente</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
  <?php

  include "db_conn.php";
  $id = $_GET['idClientes'];

  $dataClient = mysqli_query($conn, "SELECT * FROM clientes where idClientes = '$id'"); // delete query
  $row = mysqli_fetch_assoc($dataClient);
  ?>
  <div style="display: inline-flex">
    <form action="editar.php?idClientes=<?php echo $row['idClientes'] ?>" method="post">
      <h2>Editar</h2>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php $_SESSION['error'] = '';
      } ?>

      <label>Name</label>
      <input type="text" name="nome" value=<?php
                                            echo $row['nome']
                                            ?>>
      <br>

      <label>Data Nasc.</label>
      <input type="date" name="data" value=<?php
                                            echo $row['data_nascimento']
                                            ?>><br>

      <label>CPF</label>
      <input type="text" name="cpf" value=<?php
                                          echo $row['cpf']
                                          ?>><br>

      <label>RG</label>
      <input type="text" name="rg" value=<?php
                                          echo $row['rg']
                                          ?>><br>

      <label>Telefone</label>
      <input type="text" name="telefone" maxlength="11" value=<?php
                                                              echo $row['telefone']
                                                              ?>><br>
      <a href="home.php">Cancelar</a>
      <button type="submit">Salvar</button>
    </form>



    <div class="ajuste" action="" method="post">
      <h2>Lista de Endereços</h2>
      <br>
      <a href="adicionarEndereco.php?idClientes=<?php echo $id; ?>">Adicionar</a>
      <br>
      <table>
        <tr>
          <td>Logradouro</td>
          <td>Numero</td>
          <td>Bairro</td>
          <td>Cidade</td>
          <td>Estado</td>
          <td>Editar</td>
          <td>Excluir</td>
        <tr>
          <?php
          $enderecos = mysqli_query($conn, "SELECT * FROM clientes_enderecos WHERE clienteId = '$id'");
          if (mysqli_num_rows($enderecos) > 0) {
            while ($lista = mysqli_fetch_array($enderecos)) {
          ?>


        <tr>
          <td><?php echo $lista['logradouro'] ?></td>
          <td><?php echo $lista['numero'] ?></td>
          <td><?php echo $lista['bairro'] ?></td>
          <td><?php echo $lista['cidade'] ?></td>
          <td><?php echo $lista['estado'] ?></td>
          <td> <a href="editarEnderecos.php?idClientesEnderecos=<?php echo $lista['idClientesEnderecos'] ?>&idClientes=<?php echo $lista['clienteId']; ?>">Editar</a> </td>
          <td> <a href="deletarLogradouro.php?idClientesEnderecos=<?php echo $lista['idClientesEnderecos'] ?>&idClientes=<?php echo $lista['clienteId']; ?>">Excluir</a> </td>
        </tr>
    <?php
            }
          }
    ?>
    </div>

  </div>
</body>

</html>