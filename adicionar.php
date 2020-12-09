<?php
include "db_conn.php";

function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$nome = validate($_POST['nome']);
$data_nascimento = validate($_POST['data']);
$cpf = validate($_POST['cpf']);
$rg = validate($_POST['rg']);
$telefone = validate($_POST['telefone']);
$idUsuario =  $_GET['idUsuario'];

if ($nome != '' && $data_nascimento != '' && $cpf != '' && $rg != '' && $telefone != '') {
  $sql = "INSERT INTO clientes (nome, data_nascimento, cpf, rg, telefone, usuarioId) VALUES ('$nome','$data_nascimento','$cpf','$rg','$telefone','$idUsuario')";
  $update = mysqli_query($conn, $sql); // update query

  if ($update) {
    mysqli_close($conn); // Close connection
    header("location:  home.php"); // redirects to home  page
    exit();
  } else {
    echo "Error create client"; // display error message if not update
    exit();
  }
} else {
  header("Location: adicionarCliente.php?idUsuario=$idUsuario&error=Preencha todos os campos!");
  exit();
}
