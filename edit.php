<?php
include("db.php");
$nombre = '';
$direccion= '';
$telefono = '';
$mail= '';
$comentario = '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuario WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nombre = $row['nombre'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $mail = $row['mail'];
    $comentario = $row['comentario'];
  }
}
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $direccion= $_POST['direccion'];
  $telefono= $_POST['telefono'];
  $mail = $_POST['mail'];
  $title= $_POST['comentario'];
  $query = "UPDATE usuario set nombre = '$nombre', direccion = '$direccion', telefono = '$telefono', mail = '$mail', comentario= '$comentario' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
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
        <p>
                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
                                        </p>
                                        <p>
                                            <input type="text" name="direccion" class="form-control" placeholder="Dirección" autofocus>
                                        </p>
                                        <p>
                                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" autofocus>
                                        </p>
                                        <p>
                                            <input type="text" name="mail" class="form-control" placeholder="E-Mail" autofocus>
                                        </p>

                                    </div>
        <div class="form-group">
        <textarea name="comentario" class="form-control" cols="30" rows="10"><?php echo $comentario;?></textarea>
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