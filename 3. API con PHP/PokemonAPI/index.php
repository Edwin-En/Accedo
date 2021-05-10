<?php

// Pagina principal, primera vista del usuario
//Programa realizado por EDWIN ENCISO [UTP]

  session_start();

  require 'database.php';

  if(isset($_SESSION['user_id'])) {
    $records = $coneccion->prepare('SELECT id, email, password FROM usuarios WHERE id =:id');
    $records-> bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($results) > 0) {
      $user = $results;
    }

  }

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> APP Pokemon</title>

    <link rel="stylesheet" href="assets/css/style.css">

  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> <h2> Bienvenido: <?= $user['email'] ?> </h2>
      <br> <h4> Acabas de iniciar sesion, si deseas terminar la sesion pulsa: </h4>
      <a href="logout.php">Cerrar sesion</a> <br> <br>

      <h3>Si desea ver la lista de pokemones ingresa aqui: </h3>
      <h4><a href=listapokemones.php>Lista de Pokemones</a> </h4>
    <?php else: ?>

      <h1> Bienvenido a la pagina de Pokemon </h1>
      <h3> Por favor inicia sesion o registrate </h3>

      <h4> <a href="login.php">Iniciar Sesion</a> o
      <a href="signup.php">Registrarse</a> <br> <br>
      </h4>
    <?php endif; ?>

    <br> <br> <img src="/PokemonAPI/images/pokemon.jfif"> <br> <br>


  </body>

</html>
