<?php
if(isset($_POST["actualizar"])){
    if(!empty($_POST["nombre"]) && !empty($_POST["clave"]) && !empty($_POST["tipo"])){
        //echo "datos completos";
        $id=$_GET["id"];
        $nombre=$_POST["nombre"];
        $clave=$_POST["clave"];
        $tipo=$_POST["tipo"];

        $sql=$conexion->query("update usuario set nomusuario='$nombre',claveusuario='$clave',tipousuario='$tipo' where id_usuario=$id");

        if($sql==1){
            echo '<div class="alert alert-success">Usuario Actualizado Correctamente</div>';
            header("location:index.php");
        }else{
            echo '<div class="alert alert-danger">Error al Actualizar el Usuario</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Porfavor ingrese todos los campos requeridos</div>';
    }
}
?>