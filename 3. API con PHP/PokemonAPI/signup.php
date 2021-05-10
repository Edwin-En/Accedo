<?php

// Pagina para realizar el primer registro (cuenta con conexion a base de datos)
// requiere un email, contraseña y confirmacion de contraseña

  require 'database.php';
  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
    $stmt = $coneccion->prepare($sql);
    $stmt->bindParam(':email',$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()){
      $message = "Se ha creado el usuario ";

    } else {
      $message = "Lo sentimos los parametros son erroneos";
    }


  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Registro </title>

    <link rel="stylesheet" href="assets/css/style.css">

  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p><?= $message ?>
    <?php endif; ?>


    <h2> Registrate </h2>
    <span> o <a href="login.php">Inicia Sesion</a> </span>

    <form action="signup.php" method="post">
      <input type="text" name="email" placeholder="Ingresa tu correo">
      <input type="password" name="password" placeholder="Ingresa tu contraseña">
      <input type="password" name="ConfirmPassword" placeholder="Verifica tu contraseña">

      <input type="submit" value="Enviar">
    </form>


  </body>

</html>
