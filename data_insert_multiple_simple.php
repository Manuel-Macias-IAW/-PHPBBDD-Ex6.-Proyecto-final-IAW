<?php include("sesion.php"); ?>
 
<?php
include("config.php");

$sql = "INSERT INTO client_airport (first_name, last_name, email, gender, city, airport_code)
VALUES ('Luis', 'Ramirez', 'luis@example.com', 'Male', 'Sevilla', 'SVQ');";

$sql .= "INSERT INTO client_airport (first_name, last_name, email, gender, city, airport_code)
VALUES ('Ana', 'Lopez', 'ana@example.com', 'Female', 'Bilbao', 'BIO');";

$sql .= "INSERT INTO client_airport (first_name, last_name, email, gender, city, airport_code)
VALUES ('Javier', 'Ruiz', 'jruiz@example.com', 'Male', 'Valencia', 'VLC')";

if (mysqli_multi_query($conn, $sql)) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?> 
<?php include("./footer.html"); ?>