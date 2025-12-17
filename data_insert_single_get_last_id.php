<?php include("sesion.php"); ?> 
 
<?php
include("config.php");

$sql = "INSERT INTO client_airport (first_name, last_name, email, gender, city, airport_code)
VALUES ('Maria', 'Garcia', 'mgarcia@example.com', 'Female', 'Madrid', 'MAD')";

if (mysqli_query($conn, $sql)==false) {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  
} else {
 $last_id = mysqli_insert_id($conn);
 echo "New record created successfully. <br> Last inserted ID is: " . $last_id;
}

// Close connection
mysqli_close($conn);
?> 
<?php include("./footer.html"); ?>