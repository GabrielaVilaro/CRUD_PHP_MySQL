<?php include('db.php'); ?>

    <?php include('includes/header.php'); ?>

        <main class="container p-4">
            <div class="row">

                <div class="col-md-4">

                    <?php if(isset ($_SESSION['message'])) {?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?=$_SESSION['message'] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <!--mensaje de alerta con bootstrap-->
                        <?php session_unset(); } ?>
                            <!--cierra el mesaje de alerta al refrescar la página-->

                            <div class="card card-body">

                                <form action="save.php" method="POST">

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
                                        <textarea name="comentario" rows="3" class="form-control" placeholder="Comentario"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-success btn block" name='save' value="Enviar">
                                </form>
                            </div>
                </div>

                <div class="col-md-8">

                    <table class="table table-border">

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>E-Mail</th>
                                <th>Comentario</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                        $query = "SELECT *  FROM usuario";
                        $result_usuario = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result_usuario)){ ?>
                                <!--recorro mi tabla usuario-->
                                <tr>
                                    <td>
                                        <?php echo $row['nombre']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['direccion']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['telefono']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['mail']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['comentario']; ?>
                                    </td>
                                    <td><a href="edit.php?id=<?php echo $row['id'] ?>">Editar</a>
                                        <a href="delete.php?id=<?php echo $row['id'] ?>">Eliminar</a>
                                    </td>
                                </tr>
                                
                                <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

        <?php include('includes/footer.php'); ?>
