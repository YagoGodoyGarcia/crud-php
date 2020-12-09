<?php
include "db_conn.php";

function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$logradouro = validate($_POST['logradouro']);
$numero = validate($_POST['numero']);
$bairro = validate($_POST['bairro']);
$cidade = validate($_POST['cidade']);
$estado = validate($_POST['estado']);
$idClientesEnderecos = $_GET['idClientesEnderecos'];
$idClientes = $_GET['idClientes'];

if ($logradouro != '' && $numero != '' && $bairro != '' && $cidade != '' && $estado != '') {
  $sql = "UPDATE clientes_enderecos SET logradouro= '$logradouro',numero='$numero',bairro= '$bairro',cidade= '$cidade',estado='$estado' WHERE idClientesEnderecos = '$idClientesEnderecos'";
  $update = mysqli_query($conn, $sql); // update query

  if ($update) {
    mysqli_close($conn); // Close connection
    header("location: logradouroeditarCliente.php?idClientes=$idClientes"); // redirects to home  page
    exit();
  } else {
    echo "Error edit logradouro"; // display error message if not update
    exit();
  }
} else {
  header("Location: editarEnderecos.php?idClientesEnderecos=$idClientesEnderecos&idClientes=$idClientes&error=Preencha todos os campos!");
  exit();
}
