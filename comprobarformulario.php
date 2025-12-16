<?php include("sesion.php"); ?>

<?php

include ("recoge.php");

$valor=recoge("valor");

if($valor == "insertar"){
    header("Location:insertar.php");
}elseif($valor == "visualizarLastname"){
    header("Location:visualizarLastname.php");
}elseif($valor == "visualizarOrdenado"){
    header("Location:visualizarOrdenado.php");
}elseif($valor == "borrar"){
    header("Location:borrar.php");
}elseif($valor == "actualizar"){
    header("Location:actualizar.php");
}





