<?php
include "db_conn.php";

$sql = "INSERT INTO usuario( `usuario`, `nome`, `senha`) VALUES ('admin', 'admin','admin')";
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO clientes(`nome`, `data_nascimento`, `cpf`, `rg`, `telefone`, `usuarioId`) VALUES ('Erick','1995-10-20','444444444444','44444444444','222222222222', 1)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();