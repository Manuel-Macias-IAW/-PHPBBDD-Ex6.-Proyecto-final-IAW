<?php include ("cabecera.html"); ?>
<?php include("sesion.php"); ?>


<?php
include ("recoge.php");

$usuario=recoge("usuario");
$contrasena=recoge("contrasena");
$valor=recoge("valor");


$usuarioAcceso="admin";
$contrasenaAcceso="P4ssw0rd";


// Validación del código ingresado
if($usuario == "" || $contrasena == "" || $usuario != $usuarioAcceso || $contrasena != $contrasenaAcceso){
   
    $_SESSION["conectado"] = false;  
    
    header("Location:login.php");
    
}else{
        $_SESSION["conectado"] = true;  

        header("Location:bienvenida.php");
}

if($valor == "Si"){
    session_destroy();

}elseif($valor == "No"){
     $_SESSION["conectado"] = true;  

    header("Location:index.php");
}
?>

<?php include("./footer.html"); ?>
