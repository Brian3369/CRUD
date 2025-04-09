<?php
//$conexion = new Conexion();
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) && !empty($_POST["fecha-nacimiento"]) && !empty($_POST["email"])){
        $id = $_GET['id'];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha_nacimiento = $_POST["fecha-nacimiento"];
        $email = $_POST["email"];

        $sql=$conexion->getPDO()->prepare("UPDATE personas SET nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nacimiento='$fecha_nacimiento', correo='$email' WHERE id= ?");
        $sql->execute([$id]);
        
        if($sql){	
            header("location:index.php");
        }else{
            echo "<script>console.log('Error al registrar');</script>";
            echo "<div class='alert alert-danger' role='alert'>Registro fallido</div>";
        }
        
    }else{
        echo "<script>console.log('Error al registrar');</script>";
        echo "<div class='alert alert-warning' role='alert'>No puede haber campos vacios</div>";
    }
}
?>