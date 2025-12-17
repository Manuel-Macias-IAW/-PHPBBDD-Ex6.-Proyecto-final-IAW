<?php include("sesion.php"); ?>

<?php
include("config.php");
?>

<h1>Data to insert</h1>

   <form action="insertardatos.php" method="post">

    <br>
    <label>Insert first name:</label>
    <input type="text" name="first_name" required/><br>

    <label>Insert last name:</label>
    <input type="text" name="last_name" required/><br>
 
    <label>Insert email:</label>
    <input type="email" name="email" required/><br>

    <label>Insert gender:</label>
    <input type="text" name="gender" required/><br>

    <label>Insert city:</label>
    <input type="text" name="city" required/><br>

    <label>Insert airport code:</label>
    <input type="text" name="airport_code" required/><br>

    <p><input type="submit" value="Submit"></p>

   </form>

<?php include("./footer.html"); ?>