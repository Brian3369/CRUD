<?php
include "modelo/conexion.php";
$conexion = new Conexion();
$id = $_GET['id'];
$sql = $conexion->getPDO()->prepare("SELECT * FROM personas WHERE id= ?");
$sql->execute([$id]);
$datos = $sql->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center p-3">Modificar persona</h1>
    <div class="container col-9">
    <form class="col-7 mx-auto center p-3" method="POST">
        <input type="hidden" name="id" value="<?php echo $datos->id; ?>">
    <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $datos->nombre; ?>">	
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" required value="<?php echo $datos->apellido; ?>">
  </div>
  <div class="mb-3">
    <label for="dni" class="form-label">DNI</label>
    <input type="number" class="form-control" id="dni" name="dni" required value="<?php echo $datos->dni; ?>">
  </div>
  <div class="mb-3">
    <label for="fecha-nacimiento" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control" id="fecha-nacimiento" name="fecha-nacimiento" required value="<?php echo $datos->fecha_nacimiento; ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required value="<?php echo $datos->correo; ?>">	
  </div>
  <?php 
  include "controlador/modificar.php";
  ?>
  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Guardar</button>
  <br><br>
  <a href="index.php">Volver al inicio</a>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>

</body>
</html>