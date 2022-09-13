<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="css/all.min.js"></script>
</head>
<body>
<script>
        function eliminar(){
            var respuesta=confirm("seguro que deseas eliminar?");
            return respuesta;
        }
    </script>
  <h1 class="text-center py-2">Pagina Principal</h1>
  <div class="container-fluid row">
    <form class=" col-4 px-5" action="" method="POST">
      <h3>Registro de Usuarios</h3>
          <?php
            include "modelo/conectar.php";
            include "controlador/registro_usuario.php";
          ?>
      <div class="mb-3">
        <label  class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" name="usuario">
      </div>
      <div class="mb-3">
        <label  class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="clave">
      </div>
      <div class="mb-3">
          <label class="form-label">Tipo</label>
          <br>
          <input type="radio" id="admin" class="form-check-input" name="tipo" value="Administrador">
          <label for="admin" class="form-label">Administrador</label>
          <br>
          <input type="radio" id="asist" class="form-check-input" name="tipo" value="Asistente">
          <label for="asist" class="form-label">Asistente</label>
      </div>
      <button type="submit" class="btn btn-primary" name="registrar" value="ok">Registrar</button>
    </form>
    <div class="col-8">
    <?php
            include "controlador/eliminar_usuario.php";
      ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">usuario</th>
              <th scope="col">contraseña</th>
              <th scope="col">tipo</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              <?php
                include "modelo/conectar.php";
                $sql=$conexion->query("select * from usuario");
                while($datos=$sql->fetch_object()){?>
                    <tr>
                        <td><?= $datos->id_usuario ?></td>
                        <td><?= $datos->nomusuario ?></td>
                        <td><?= $datos->claveusuario ?></td>
                        <td><?= $datos->tipousuario ?></td>
                        <td>
                            <a href="usuarioactualizar.php?id=<?= $datos->id_usuario?>" class="btn btn-small btn-warning">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_usuario ?>" class="btn btn-small btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                </tr>
                
                <?php
                }
                ?>
          </tbody>
        </table>
    </div>
  </div>
</body>
</html>