<?php
include("db.php");
$nombre = '';
$marca = '';
$codigo = '';
$color = '';
$categoria = '';
$precio = '';
$precio_proveedor = '';
$tamano = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM producto WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $marca = $row['marca'];
    $codigo = $row['codigo'];
    $color = $row['color'];
    $categoria = $row['categoria'];
    $precio = $row['precio'];
    $precio_proveedor = $row['precio_proveedor'];
    $tamano = $row['tamano'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $marca = $_POST['marca'];
  $codigo = $_POST['codigo'];
  $color = $_POST['color'];
  $categoria = $_POST['categoria'];
  $precio = $_POST['precio'];
  $precio_proveedor = $_POST['precio_proveedor'];
  $tamano = $_POST['tamano'];

  $query = "UPDATE producto set nombre = '$nombre', marca = '$marca', codigo = '$codigo', color = '$color', categoria = '$categoria', precio = '$precio', precio_proveedor = '$precio_proveedor', tamano = '$tamano' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="actualizar nombre">
        </div>
        <div class="form-group">
          <input name="marca" type="text" class="form-control" value="<?php echo $marca; ?>" placeholder="actualizar marca">
        </div>
        <div class="form-group">
          <input name="codigo" type="text" class="form-control" value="<?php echo $codigo; ?>" placeholder="actualizar codigo">
        </div>
        <div class="form-group">
          <input name="color" type="text" class="form-control" value="<?php echo $color; ?>" placeholder="actualizar color">
        </div>
        <div class="form-group">
          <input name="categoria" type="text" class="form-control" value="<?php echo $categoria; ?>" placeholder="actualizar categoria">
        </div>
        <div class="form-group">
          <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="actualizar precio">
        </div>
        <div class="form-group">
          <input name="precio_proveedor" type="text" class="form-control" value="<?php echo $precio_proveedor; ?>" placeholder="actualizar precio de proveedor">
        </div>
        <div class="form-group">
          <input name="tamano" type="text" class="form-control" value="<?php echo $tamano; ?>" placeholder="actualizar tamaño">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>