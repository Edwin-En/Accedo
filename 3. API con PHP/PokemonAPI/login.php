<?php
// Inicio de sesion, requiere una cuenta ya registrada en la base de datos
// Se ingresa con email y contraseña
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /PokemonAPI/listapokemones.html');
  }

  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $coneccion->prepare('SELECT id, email, password FROM usuarios WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header('Location: /PokemonAPI/index.php');
    } else {
      $message = "Las contraseñas no coinciden";
    }

  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Inicio de sesion </title>

    <link rel="stylesheet" href="assets/css/style.css">

  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <h2> Inicia sesion </h2>
    <span> o <a href="signup.php">Registrate</a> </span>

    <?php if (!empty($message)) :  ?>
      <p><?= $message ?>
    <?php endif; ?>

    <form action="login.php" method="post">
      <input type="text" name="email" placeholder="Ingresa tu correo">
      <input type="password" name="password" placeholder="Ingresa tu contraseña">
      <input type="submit" value="Enviar">
    </form>


  </body>

</html>
