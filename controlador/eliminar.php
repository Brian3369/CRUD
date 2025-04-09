<?php
// $conexion = new Conexion();
if(!empty($_GET["id-delete"])){
    $id = $_GET["id-delete"];
    $sql = $conexion->getPDO()->prepare("DELETE FROM personas WHERE id= ?");
    $sql->execute([$id]);

    if($sql){
        header("location:index.php");
    }else{
        echo "<script>console.log('Error al eliminar');</script>";
        echo "<div class='alert alert-danger' role='alert'>Eliminacion fallida</div>";
    }
}
?>