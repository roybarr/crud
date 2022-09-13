<?php
if(isset($_POST["registrar"])){
    if(!empty($_POST["usuario"]) && !empty($_POST["clave"]) && !empty($_POST["tipo"])){
        //echo "datos completos";
        $nombres=$_POST["usuario"];
        $clave=$_POST["clave"];
        $tipo=$_POST["tipo"];

        //$consulta = "INSERT INTO empleado(nomempleado, apellidosempleado, direccion, sexo, fechanac, emailempleado) VALUES ('$nombre','$clave','$tipo')";
        //$resultado=mysqli_query($conexion,$consulta);
        $sql=$conexion->query("INSERT INTO usuario(nomusuario,claveusuario,tipousuario) VALUES ('$nombres','$clave','$tipo')");

        if($sql==1){
            echo '<div class="alert alert-success">Usuario Registrado Correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar el Usuario</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Porfavor ingrese todos los campos requeridos</div>';
    }
}
?>