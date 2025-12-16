<?php include ("cabecera.html"); ?>
<?php include("sesion.php"); ?>

<?php

include("db_connect.php");


//Lanzamos la consulta
$sql = "SELECT COUNT(*) AS total_records FROM client_airport";

$result = mysqli_query($conn, $sql);
if ($result==false) {
    echo "Error in the query: " . mysqli_error($conn);
}
else {

// Obtener la única fila de resultados
$row = mysqli_fetch_assoc($result);

// Acceder al valor contado
$records_count = $row["total_records"];

echo "The table consists of **" . $records_count . "** records.";

}

// Close connection
mysqli_close($conn);
?>

<?php include("./footer.html"); ?>
