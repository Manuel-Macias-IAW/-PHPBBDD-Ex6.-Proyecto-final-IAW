<?php include("sesion.php"); ?>

<?php
include("db_connect.php");
?>

<h1>What type of query do you want to perform</h1>

   <form action="comprobarformulario.php" method="post">

    <br>
    
    <label>
        <input type="radio" name="valor" value="insertar" /> 
        Insert data through a form
    </label><br>

    <label>
        <input type="radio" name="valor" value="visualizarLastname" /> 
        View data for those matching a lastname passed through a form
    </label><br>

    <label>
        <input type="radio" name="valor" value="visualizarOrdenado" /> 
        View all data sorted ascending or descending via a form
    </label><br>

    <label>
        <input type="radio" name="valor" value="borrar" /> 
        Delete a user whose ID is passed through a form
    </label><br>

    <label>
        <input type="radio" name="valor" value="actualizar" /> 
        Update the lastname of a user whose ID is passed through a form
    </label><br>


    <p><input type="submit" value="Submit"></p>

   </form>

<?php include("./footer.html"); ?>