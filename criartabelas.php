<?php
include "db_conn.php";



$sql = "CREATE TABLE usuario(
   idUsuario INT AUTO_INCREMENT PRIMARY KEY,
   usuario varchar(20) NOT NULL,
   nome varchar(20) NOT NULL,
   senha varchar(20) NOT NULL,
   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE clientes(
  idClientes INT AUTO_INCREMENT PRIMARY KEY,
  nome varchar(40) NOT NULL,
  data_nascimento date NOT NULL,
  cpf varchar(12) NOT NULL,
  rg varchar(12) NOT NULL,
  telefone varchar(15) NOT NULL,
  usuarioId INT NOT NULL,
  CONSTRAINT fk_usuario
  FOREIGN KEY (usuarioId) 
  REFERENCES usuario(idUsuario)
      ON UPDATE CASCADE
      ON DELETE CASCADE,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
 echo "Table MyGuests created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE clientes_enderecos(
    idClientesEnderecos INT AUTO_INCREMENT PRIMARY KEY,
    logradouro varchar(40) NOT NULL,
    numero varchar(20) NOT NULL,
    bairro varchar(30) NOT NULL,
    cidade varchar(30) NOT NULL,
    estado varchar(20) NOT NULL,
 	  clienteId INT NOT NULL,
    CONSTRAINT fk_cliente
    FOREIGN KEY (clienteId) 
    REFERENCES clientes(idClientes)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();
