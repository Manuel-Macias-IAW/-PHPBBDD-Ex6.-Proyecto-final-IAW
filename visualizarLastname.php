<?php include("sesion.php"); ?>

<?php
include("db_connect.php");
?>

<h1>Filter by lastname:</h1>

   <form action="visualizarLastnameWhere.php" method="post">

    <br>
    <label>Insert lastname field to filter:</label>
    <input type="text" name="lastname" required/><br>

    <p><input type="submit" value="Enviar"></p>




<?php include("./footer.html"); ?>
