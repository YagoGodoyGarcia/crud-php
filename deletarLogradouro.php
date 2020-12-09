<?php

include "db_conn.php";

$id = $_GET['idClientesEnderecos']; // get id through query string
$idClientes = $_GET['idClientes'];
$del = mysqli_query($conn,"delete from clientes_enderecos where idClientesEnderecos = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location: editarCliente.php?idClientes=$idClientes"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting client"; // display error message if not delete
}
?>