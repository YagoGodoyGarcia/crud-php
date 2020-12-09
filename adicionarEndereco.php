<!DOCTYPE html>
<html>

<head>
  <title>Adicionar Endereços</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">


</head>

<body>
  <?php

  include "db_conn.php";
  $id = $_GET['idClientes'];
  ?>
  <div style="display: inline-flex">
    <form action="adicionarLogradouro.php?idClientes=<?php echo $id ?>" method="post">
      <h2>Endereços</h2>


      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php $_SESSION['error'] = '';
      } ?>

      <label>Logradouro</label>
      <input type="text" name="logradouro" placeholder="Digite o Logradouro!">
      <br>

      <label>Numero</label>
      <input type="text" name="numero" placeholder="Digite o Numero!"><br>

      <label>Bairro</label>
      <input type="text" name="bairro" placeholder="Digite o Bairro!"><br>

      <label>Cidade</label>
      <input type="text" name="cidade" placeholder="Digite a Cidade!"><br>

      
      
      <div style='display: flex;'>
      <label>Estado:
      <select id='selectEstado' name='estado'>

      </select>
      <!-- <input style='display: none;'type="text" name="estado" maxlength="2" placeholder="Estado"><br>  -->
      </label>
      
      </div>
      <br>
      <a href="home.php">Cancelar</a>
      <button type="submit">Salvar</button>
    </form>
  </div>
</body>
<script>
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", 'https://www.geonames.org/childrenJSON?geonameId=3469034', false); // false for synchronous request
  xmlHttp.send(null);
  let listaEstado = JSON.parse(xmlHttp.responseText)

  for (let i = 0; i < listaEstado.totalResultsCount; i++) {

    var tag = document.createElement("option");
    var text = document.createTextNode(listaEstado.geonames[i].name);
    tag.appendChild(text);
    tag.value= listaEstado.geonames[i].name
    document.getElementById('selectEstado').appendChild(tag)
  }
</script>

</html>