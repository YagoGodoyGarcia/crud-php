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
$idClientes =  $_GET['idClientes'];

if ($logradouro != '' && $numero != '' && $bairro != '' && $cidade != '' && $estado != '') {
  $sql = "INSERT INTO clientes_enderecos (logradouro, numero, bairro, cidade, estado, clienteId ) VALUES ( '$logradouro','$numero','$bairro','$cidade','$estado',$idClientes)";
  $update = mysqli_query($conn, $sql); 

  if ($update) {
    mysqli_close($conn); // Close connection
    header("location: editarCliente.php?idClientes=$idClientes"); // redirects to home  page
    exit();
  } else {
    echo "Error create logradouro" . $conn->error ; // display error message if not update
    exit();
  }
} else {
  header("Location: adicionarEndereco.php?idClientes=$idClientes&error=Preencha todos os campos!");
  exit();
}
