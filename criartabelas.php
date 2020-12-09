<?php
include "db_conn.php";



$sql = "CREATE TABLE usuarioooo(
   idUsuario INT AUTO_INCREMENT PRIMARY KEY,
   login varchar(20) NOT NULL,
   nome varchar(20) NOT NULL,
   senha varchar(20) NOT NULL,
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
    estado varchar(2) NOT NULL,
 	clienteId INT NOT NULL,
    CONSTRAINT fk_cliente
    FOREIGN KEY (idClientes) 
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

$sql = "INSERT INTO usuario(idUsuario, usuario, nome, senha, reg_date) VALUES ('admin', 'admin','admin')";
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO clients(nome, data_nascimento, cpf, rg, telefone, usuarioId) VALUES ('Erick','1995-10-20','444444444444','44444444444','222222222222', 1)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
