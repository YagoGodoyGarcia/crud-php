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
$idClientes =  $_GET['idClientes'];

if ($nome != '' && $data_nascimento != '' && $cpf != '' && $rg != '' && $telefone != '') {
  $sql = "UPDATE clientes SET nome= '$nome',data_nascimento='$data_nascimento',cpf= '$cpf',rg= '$rg',telefone='$telefone' WHERE idClientes = '$idClientes'";
  $update = mysqli_query($conn, $sql); // update query

  if ($update) {
    mysqli_close($conn); // Close connection
    header("location:  home.php"); // redirects to home  page
    exit();
  } else {
    echo "Error edit client"; // display error message if not update
    exit();
  }
} else {
  header("Location: editarCliente.php?idClientes=$idClientes&error=Preencha todos os campos!");
  exit();
}
