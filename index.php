<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="saveTask.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="marca" rows="2" class="form-control" placeholder="marca" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="codigo" rows="2" class="form-control" placeholder="codigo" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="color" rows="2" class="form-control" placeholder="color" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="categoria" rows="2" class="form-control" placeholder="categoria" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="precio" rows="2" class="form-control" placeholder="precio" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="precio_proveedor" rows="2" class="form-control" placeholder="precio de proveedor" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="tamano" rows="2" class="form-control" placeholder="tamaño" autofocus>
          </div>
          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>nombre</th>
            <th>marca</th>
            <th>codigo</th>
            <th>color</th>
            <th>categoria</th>
            <th>precio</th>
            <th>precio de proveedor</th>
            <th>tamaño</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM producto";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['marca']; ?></td>
            <td><?php echo $row['codigo']; ?></td>
            <td><?php echo $row['color']; ?></td>
            <td><?php echo $row['categoria']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><?php echo $row['precio_proveedor']; ?></td>
            <td><?php echo $row['tamano']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>