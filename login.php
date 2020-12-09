<?php
session_start();
include "db_conn.php";

if (isset($_POST['login']) && isset($_POST['password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $login = validate($_POST['login']);
  $pass = validate($_POST['password']);

  if (empty($login)) {
    header("Location:  index.php?error=User Name is required");
    exit();
  } else if (empty($pass)) {
    header("Location:  index.php?error=Password is required");
    exit();
  } else {
    $sql = "SELECT * FROM usuario WHERE usuario='$login' AND senha='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['usuario'] === $login && $row['senha'] === $pass) {
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['idUsuario'] = $row['idUsuario'];
        header("Location:  home.php");
        exit();
      } else {
        header("Location:  index.php?error=Incorect User name or password");
        exit();
      }
    } else {
      header("Location:  index.php?error=Incorect User name or password");
      exit();
    }
  }
} else {
  header("Location:  index.php");
  exit();
}
