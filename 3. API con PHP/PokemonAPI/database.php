<?php

// Conexion con la base de datos SQL

  $server = "localhost";
  $username = "root";
  $password = '';
  $database = 'pokemonapi_database';    //Base de Datos

  try {
    $coneccion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);


  } catch (PDOException $error) {
    die('Coneccion errada: '.$error->getMessage());

  }

?>
