<?php 

include("db.php");

if(isset($_POST['save'])) { //si existe save, guardar en cada variable los datos ingresados por el usuario
    $nombre=$_POST['nombre'];  //guardo cada dato ingredado
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono']; 
    $mail=$_POST['mail'];
    $comentario=$_POST['comentario'];

    $query="INSERT INTO usuario(nombre, direccion, telefono, mail, comentario) VALUES ('$nombre', '$direccion', '$telefono', '$mail', '$comentario')"; //guardo cada variable en la tabla usuario de mi base de datos
    $result=mysqli_query($conn, $query); 

    if (!$result) { //si result no es cierto dar un mensaje de fail
        die("Fail");
    }
    

    $_SESSION['message'] = "Guardado con éxito.";
    $_SESSION['message_type'] = 'success';


    header("Location: index.php");
}

?>