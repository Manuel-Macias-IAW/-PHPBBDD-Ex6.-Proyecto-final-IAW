<?php include("sesion.php"); ?>

<?php
include("db_connect.php");
include ("recoge.php");

$first_name=recoge("first_name");
$last_name=recoge("last_name");
$email=recoge("email");
$gender=recoge("gender");
$city=recoge("city");
$airport_code=recoge("airport_code");

if ($first_name == "" || $last_name == "" || $email == "" || $gender == "" || $city == "" || $airport_code == "") {
    header("Location: insertar.php");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: insertar.php");
    exit();
}

if (strlen($airport_code) > 10) {
    header("Location: insertar.php");
    exit();
}

$sql = "INSERT INTO client_airport (first_name, last_name, email, gender, city, airport_code)
VALUES ('$first_name', '$last_name', '$email', '$gender', '$city', '$airport_code')";

if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
else {
    echo "New record created successfully";
}

mysqli_close($conn);
?>

<?php include("./footer.html"); ?>