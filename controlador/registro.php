<?php
//$conexion = new Conexion();
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha-nacimiento"]) and !empty($_POST["email"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $fecha_nacimiento = $_POST["fecha-nacimiento"];
        $email = $_POST["email"];

        $sql = $conexion->getPDO()->prepare("INSERT INTO personas (nombre, apellido, dni, fecha_nacimiento, correo) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$nombre , $apellido, $dni, $fecha_nacimiento, $email]);
        
        if ($sql) {	
            echo "<script>console.log('Registro exitoso');</script>";
            echo "<div class='alert alert-success' role='alert'>Registro exitoso</div>";
            header("location:index.php");
        } else {
            echo "<script>console.log('Error al registrar');</script>";
            echo "<div class='alert alert-danger' role='alert'>Registro fallido</div>";
        }

    }else {
        echo "<script>console.log('Error al registrar');</script>";
        echo "<div class='alert alert-warning' role='alert'>No puede haber campos vacios</div>";
    }
}
?>