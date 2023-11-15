<?php

include('db.php');

if (isset($_POST['saveTask'])) {
  $nombre = $_POST['nombre'];
  $marca = $_POST['marca'];
  $codigo = $_POST['codigo'];
  $color = $_POST['color'];
  $categoria = $_POST['categoria'];
  $precio = $_POST['precio'];
  $precio_proveedor = $_POST['precio_proveedor'];
  $tamano = $_POST['tamano'];
  $query = "INSERT INTO producto(nombre, marca, codigo, color, categoria, precio, precio_proveedor, tamano) VALUES ('$nombre', '$marca', '$codigo', '$color', '$categoria', '$precio', '$precio_proveedor', '$tamano' )";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>