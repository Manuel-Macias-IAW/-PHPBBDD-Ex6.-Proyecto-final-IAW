<?php include ("cabecera.html"); ?>

   <?php
session_start();
if(!isset ($_SESSION["conectado"] )|| $_SESSION["conectado"] = false){
        header("Location:login.php");

}


?>

<ol>
    <li><a href="db_connect.php">Connect</a></li>
    <li><a href="db_create.php">Create database (connect, create, disconnect)</a></li>
    <li><a href="db_drop.php">Drop database (connect, drop, disconnect)</a></li>
    <li><a href="table_create_airport.php">Create table client_airport (connect, create, disconnect)</a></li>

    <li><a href="table_check_exists.php">Check if table client_airport exists (connect, check, disconnect)</a></li>
            <li><a href="table_drop.php">Drop table client_airport (connect, drop, disconnect)</a></li>

    <li><a href="data_insert_single.php">Insert data (single record) (connect, insert, disconnect)</a></li>
    <li><a href="data_insert_single_get_last_id.php">Insert data (single record) and Get last inserted ID (connect, insert, get last id, disconnect)</a></li>
    <li><a href="data_insert_multiple_simple.php">Insert multiple data without prepared statements (connect, execute x3, disconnect)</a></li>
    <li><a href="data_insert_multiple_prepared.php">Insert multiple data (prepared statements) (connect, prepare, execute x3, disconnect)</a></li>
    <li><a href="data_count.php">Count table records (connect, select, disconnect)</a></li>
    <li><a href="data_select_all.php">View all data (connect, select, disconnect)</a></li>
    <li><a href="data_select_where.php">View data where lastName is Doe (connect, select where, disconnect)</a></li>
    <li><a href="data_select_orderby.php">View data sorted by lastName (connect, select orderby, disconnect)</a></li>
    <li><a href="data_select_where_orderby_html_table.php">View filtered and sorted data in HTML table (connect, select where orderby, disconnect)</a></li>
    <li><a href="data_delete.php">Delete user with id=3 (connect, delete, disconnect)</a></li>
    <li><a href="data_update.php">Update lastname for user with id=2 (connect, update, disconnect)</a></li>
    <li><a href="otros.php">Custom queries</a></li>

 
</ol>


    <form action="comprobar.php" method="post">
 
    <label>Do you want to log out?:</label>
    <br>

    <input type="submit" name="valor" value="Yes" />
    <input type="submit" name="valor" value="No">

</form>


</body>
</html>