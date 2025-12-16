<?php include("sesion.php"); ?>
 
 <?php
include("db_connect.php");

// sql to delete a record
$sql = "DELETE FROM client_airport WHERE id=3";

if (!mysqli_query($conn, $sql)) {
    echo "Error deleting record: " . mysqli_error($conn);
} elseif (mysqli_affected_rows($conn)==0){ 

    echo "Record doesn't exist. Impossible to delete it.";}
else{
    echo "Record deleted successfully";
}

// Close connection
mysqli_close($conn);
?> 
<?php include("./footer.html"); ?>
