<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['idUsuario']) && isset($_SESSION['nome'])) {

?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <body style="justify-content: flex-start !important;">
    <h1>Hello, <?php echo $_SESSION['nome']; ?></h1>
    <a href="adicionar.php?idUsuario=<?php echo $_SESSION['idUsuario']; ?>">Adicionar Cliente</a>
    <br>
    <a href="logout.php">Sair</a>
    <br>
    <table>
      <tr>
        <td>Nome</td>
        <td>Data Nasc.</td>
        <td>CPF</td>
        <td>RG</td>
        <td>Telefone</td>
        <td>Endereços</td>
        <td>Editar</td>
        <td>Excluir</td>
      </tr>
      <?php

      $clientes = mysqli_query($conn, "SELECT * FROM clientes WHERE usuarioId = $_SESSION[idUsuario]"); // fetch data from database

      while ($data = mysqli_fetch_array($clientes)) {
      ?>
        <tr>
          <td><?php echo $data['nome']; ?></td>
          <td><?php echo $data['data_nascimento']; ?></td>
          <td><?php echo $data['cpf']; ?></td>
          <td><?php echo $data['rg']; ?></td>
          <td><?php echo $data['telefone']; ?></td>

          <td>
            <?php
            $enderecos = mysqli_query($conn, "SELECT * FROM clientes_enderecos WHERE idClientes = $data[idClientes]");

            if ($enderecos === TRUE) {
              while ($lista = mysqli_fetch_array($enderecos)) {
            ?>
                <p>
                  Logradouro: <?php echo $lista['logradouro'] ?>,
                  Numero: <?php echo $lista['numero'] ?>,
                  Bairro: <?php echo $lista['bairro'] ?>,
                  Cidade: <?php echo $lista['cidade'] ?>,
                  Estado: <?php echo $lista['estado'] ?>

                </p>
            <?php
              }
            }
            ?>
          <td><a href="editarCliente.php?idClientes=<?php echo $data['idClientes']; ?>">Editar</a></td>
          <td><a href="deletar.php?idClientes=<?php echo $data['idClientes']; ?>">Excluir</a></td>
          </td>

        </tr>
      <?php
      }
      ?>
    </table>


  </body>

  </html>

<?php
} else {
  header("Location: ./index.php");
  exit();
}
?>