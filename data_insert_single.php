<?php include("sesion.php"); ?>

<?php
include("config.php");


$sql = "INSERT INTO client_airport (first_name, last_name, email, gender, city, airport_code)
VALUES ('Carlos', 'Santana', 'csantana@ejemplo.com', 'Male', 'Valencia', 'ES')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar conexión
mysqli_close($conn);
?> 

<?php include("./footer.html"); ?>