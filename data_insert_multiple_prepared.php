<?php include("sesion.php"); ?>

<?php
include("db_connect.php");


$stmt = mysqli_prepare($conn, "INSERT INTO client_airport (first_name, last_name, email, gender, city, airport_code) VALUES (?, ?, ?, ?, ?, ?)");


mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $email, $gender, $city, $airport_code);

$first_name="John";
$last_name="Doe";
$email="john@example.com";
$gender="Male";
$city="New York";
$airport_code="JFK";
mysqli_stmt_execute($stmt);

$first_name="Mary";
$last_name="Moe";
$email="mary@example.com";
$gender="Female";
$city="London";
$airport_code="LHR";
mysqli_stmt_execute($stmt);

$first_name="Julie";
$last_name="Dooley";
$email="julie@example.com";
$gender="Female";
$city="Paris";
$airport_code="CDG";
mysqli_stmt_execute($stmt);

echo "New records created successfully using prepared statements";

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<?php include("./footer.html"); ?>