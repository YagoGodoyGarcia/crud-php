<!DOCTYPE html>
<html>

<head>
  <title>Editar Endereco</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

  <div style="display: inline-flex">
    <?php

    include "db_conn.php";
    $idClientesEnderecos = $_GET['idClientesEnderecos'];
    $idClientes = $_GET['idClientes'];

    $dataClient = mysqli_query($conn, "SELECT * FROM clientes_enderecos where idClientesEnderecos = '$idClientesEnderecos'");
    $row = mysqli_fetch_assoc($dataClient);
    ?>
    <form action="editarLogradouro.php?idClientes=<?php echo $idClientes ?>&idClientesEnderecos=<?php echo $idClientesEnderecos ?>" method="post">
      <h2>Editar</h2>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php $_SESSION['error'] = '';
      } ?>

      <label>logradouro</label>
      <input type="text" name="logradouro" value='<?php echo $row['logradouro'] ?>' />
      <br>

      <label>Numero</label>
      <input type="text" name="numero" value='<?php echo $row['numero']; ?>'><br>

      <label>Bairro</label>
      <input type="text" name="bairro" value='<?php  echo $row['bairro']; ?>'><br>

      <label>Cidade</label>
      <input type="text" name="cidade" value='<?php echo $row['cidade']; ?>'><br>

      <label>Estado</label>
      <input type="text" name="estado" value='<?php echo $row['estado'];?>'><br>
      
      <a href="home.php">Cancelar</a>
      <button type="submit">Salvar</button>
    </form>
  </div>
</body>

</html>