<?php include("sesion.php"); ?>

<?php
include("config.php");


$sql = "CREATE TABLE client_airport (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
email VARCHAR(100),
gender VARCHAR(50),
city VARCHAR(100),
airport_code VARCHAR(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)==false) {
  echo "Error creating table: " . mysqli_error($conn);
} else {
  echo "Table airport created successfully";
}

// Close connection
mysqli_close($conn);
?> 

<?php include("./footer.html"); ?>