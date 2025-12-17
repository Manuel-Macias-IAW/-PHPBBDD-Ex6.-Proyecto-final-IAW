<?php include("sesion.php"); ?>

<?php
include("config.php");

//Lanzamos la consulta
$sql = "SELECT id, first_name, last_name, email, airport_code FROM client_airport ORDER BY last_name";
$result = mysqli_query($conn, $sql);

if ($result==false) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
elseif (mysqli_num_rows($result) > 0) {

  // Convertir todo a un array asociativo
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Recorrer con foreach
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