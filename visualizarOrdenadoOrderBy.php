<?php include("sesion.php"); ?>

<?php
include("config.php");
include("recoge.php");

$column = recoge("column");
$order = recoge("order");

if ($column == "" || $order == "") {

    header("Location: view_sorted.php");
    exit();
}


$allowed_columns = ["first_name", "last_name", "email", "city", "airport_code"];
if (!in_array($column, $allowed_columns)) {
    echo "Error: Invalid column.";
    exit();
}


$sql = "SELECT id, first_name, last_name, email, city, airport_code FROM client_airport ORDER BY $column $order";
$result = mysqli_query($conn, $sql);

if ($result == false) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
elseif (mysqli_num_rows($result) > 0) {

  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

  echo "<h2>List sorted by " . $column . " (" . $order . ")</h2>";

  foreach ($rows as $row) {
    echo "id: " . $row["id"] . 
         " - Name: " . $row["first_name"] . " " . $row["last_name"] . 
         " - Email: " . $row["email"] . 
         " - City: " . $row["city"] . 
         " - Airport Code: " . $row["airport_code"] . "<br>";
  }

} else {
  echo "0 results";
}

mysqli_close($conn);
?>

<?php include("./footer.html"); ?>