<?php
include "modelo/conectar.php";


$id = $_GET["id"];

$sql=$conexion->query("select * from usuario where id_usuario=$id");

?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="css/all.min.js"></script>
</head>
<body>
        <form class="col-4 px-5 m-auto" action="" method="POST">
            <?php
            include "controlador/actualizar_usuario.php";
            ?>
            <h3 class="text-center">Actualizar Usuario</h3>
            <input type="text" name="id" hidden value="<?= $_GET["id"];?>">
            <?php
            while($datos=$sql->fetch_object()){
            ?>
                <div class="mb-3">
                <label class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nomusuario?>"> 
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="text" class="form-control" name="clave" value="<?= $datos->claveusuario?>"> 
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo</label>
                <br>
                <input type="radio" id="admin" class="form-check-input" name="tipo" value="Administrador" <?php $tipo=$datos->tipousuario; if($tipo=="Administrador"){echo 'checked';}?>>
                <label for="admin" class="form-label">Administrador <?php if($tipo=="Administrador"){echo '(actual)';}?></label>
                <br>
                <input type="radio" id="asist" class="form-check-input" name="tipo" value="Asistente" <?php $tipo=$datos->tipousuario; if($tipo=="Asistente"){echo 'checked';}?>>
                <label for="asist" class="form-label">Asistente <?php if($tipo=="Asistente"){echo '(actual)';}?></label>
            </div>
            <?php
            }
            ?>
            
            <button type="submit" class="btn btn-primary" name="actualizar" value="ok">Actualizar Usuario</button>
        </form>
</body>
</html>