<?php include("sesion.php"); ?>

<?php
include("db_connect.php");
include ("recoge.php");


$last_name=recoge("lastname");

if ($last_name == "") {
    header("Location: visualizarlastname.php");
    exit();
}


$sql = "SELECT id, first_name, last_name, email, airport_code FROM client_airport WHERE last_name='$last_name'";
$result = mysqli_query($conn, $sql);

if ($result == false) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
elseif (mysqli_num_rows($result) > 0) {

  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

  echo "<h2>Results for last name: " . $last_name . "</h2>";

  foreach ($rows as $row) {
    echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . " - Email: " . $row["email"] . " - Airport Code: " . $row["airport_code"] . "<br>";
  }

} else {
  echo "No results found for last name: " . $last_name;
}

// Close connection
mysqli_close($conn);
?>

<?php include("./footer.html"); ?>