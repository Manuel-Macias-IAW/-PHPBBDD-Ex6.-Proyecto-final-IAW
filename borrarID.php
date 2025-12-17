<?php include("sesion.php"); ?>

<?php
include("config.php");
include ("recoge.php");


$id = recoge("id");

if ($id == "") {
    header("Location: borrar.php");
    exit();
}

$sql = "DELETE FROM client_airport WHERE id=$id";

if (!mysqli_query($conn, $sql)) {
    echo "Error deleting record: " . mysqli_error($conn);
} elseif (mysqli_affected_rows($conn) == 0) {
    echo "Record doesn't exist. Impossible to delete it.";
} else {
    echo "Record deleted successfully";
}

mysqli_close($conn);
?>

<?php include("./footer.html"); ?>