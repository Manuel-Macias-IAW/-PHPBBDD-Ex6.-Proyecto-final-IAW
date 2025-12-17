<?php include("sesion.php"); ?>

<?php
include("config.php");

$sql = "SELECT id, first_name, last_name, email, airport_code FROM client_airport";
$result = mysqli_query($conn, $sql);

if ($result==false) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
elseif (mysqli_num_rows($result) > 0) {
  // Fetch all results as an associative array
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  print "<pre>";
  print_r($rows);
  print "</pre>";

  // Use foreach to iterate
  foreach ($rows as $row) {
    echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . " - Email: " . $row["email"] . " - Airport Code: " . $row["airport_code"] . "<br>";
  }
} else {
  echo "0 results";
}

// Close connection
mysqli_close($conn);
?>

<?php include("./footer.html"); ?>