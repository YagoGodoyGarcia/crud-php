<?php

include "db_conn.php";

$id = $_GET['idClientes']; // get id through query string

$del = mysqli_query($conn,"delete from clientes where idClientes = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:  home.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting client"; // display error message if not delete
}
?>