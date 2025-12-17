<?php include("sesion.php"); ?>

<?php
include("config.php");
?>

<h1>Update User Last Name</h1>

<form action="actualizarID.php" method="post">

    <label>User ID to modify:</label>
    <br>
    <input type="number" name="id" required>
    <br>

    <label>Last Name:</label>
    <br>
    <input type="text" name="last_name" required>
    <br>

    <p><input type="submit" value="Submit"></p>

</form>

<?php include("./footer.html"); ?>