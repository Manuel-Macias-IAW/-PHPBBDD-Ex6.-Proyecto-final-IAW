<?php include("sesion.php"); ?>

<?php
include("db_connect.php");
?>

<h1>View Sorted Data</h1>

<form action="visualizarOrdenadoOrderBy.php" method="post">

    <label>Select field to sort by:</label>
    <br>
    <select name="column" required>
        <option value="first_name">First Name</option>
        <option value="last_name">Last Name</option>
        <option value="email">Email</option>
        <option value="city">City</option>
        <option value="airport_code">Airport Code</option>
    </select>
    <br>

    <label>Select sort order:</label>
    <br>
    <select name="order" required>
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>
    </select>
    
    <br>

    <p><input type="submit" value="Sort"></p>

</form>

<?php include("./footer.html"); ?>