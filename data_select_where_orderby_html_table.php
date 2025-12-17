<?php include("sesion.php"); ?>

<?php
include("config.php");

// Lanzamos la consulta 
$sql = "SELECT id, first_name, last_name, email, airport_code FROM client_airport ORDER BY last_name";
$result = mysqli_query($conn, $sql);

if ($result==false) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
elseif (mysqli_num_rows($result) > 0) {

  // Convert result to an array so foreach can be used
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

  echo "<table border=1><tr><th>ID</th><th>Name</th><th>Email</th><th>Airport Code</th></tr>";

  foreach ($rows as $row) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]." ".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["airport_code"]."</td></tr>";
  }

  echo "</table>";

} else {
  echo "0 results";
}

// Close connection
mysqli_close($conn);
?>

<?php include("./footer.html"); ?>