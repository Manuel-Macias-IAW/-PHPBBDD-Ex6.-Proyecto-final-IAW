<?php include("sesion.php"); ?>

<?php
include("db_connect.php");
?>

<h1>Delete User</h1>

<form action="borrarID.php" method="post">

    <label>Enter the user ID to delete:</label>
    <br>
    <input type="number" name="id" required>
    
    <br>

    <p><input type="submit" value="Submit"></p>

</form>

<?php include("./footer.html"); ?>