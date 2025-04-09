<?php
include "modelo/conexion.php";
include "controlador/eliminar.php";
$conexion = new Conexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</head>

<body>
  <script src="JS/script.js"></script>

  <h1 class="text-center p-3">CRUD PHP</h1>
  <h3>Test</h3>
  <div class="container-fluid row">
    <form class="col-4 p-3" method="POST">
      <h3 class="text-center text-secundary">Registro</h3>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required>
      </div>
      <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="number" class="form-control" id="dni" name="dni" required>
      </div>
      <div class="mb-3">
        <label for="fecha-nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha-nacimiento" name="fecha-nacimiento" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <?php
      include "controlador/registro.php";
      ?>
      <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>
    <div class="col-8 p-4">
      <table class="table">
        <thead class="table-info">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">DNI</th>
            <th scope="col">Fecha Nac.</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?PHP
          $sql = $conexion->getPDO()->prepare("SELECT * FROM personas");
          $sql->execute();
          while ($datos = $sql->fetch(PDO::FETCH_OBJ)) { ?>
            <tr>
              <td><?php echo $datos->id; ?></td>
              <td><?php echo $datos->nombre; ?></td>
              <td><?php echo $datos->apellido; ?></td>
              <td><?php echo $datos->dni; ?></td>
              <td><?php echo $datos->fecha_nacimiento; ?></td>
              <td><?php echo $datos->correo; ?></td>
              <td>
                <a href="modificar_persona.php?id=<?= $datos->id; ?>" class="btn btn-small btn-warning">editar</a>
                <a onclick="return eliminar();" href="index.php?id-delete=<?= $datos->id; ?>" class="btn btn-small btn-danger">Eliminar</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</body>

</html>