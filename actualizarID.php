<?php include("sesion.php"); ?>

<?php
include("config.php");
include ("recoge.php");


$id = recoge("id");
$last_name = recoge("last_name");

if ($id == "" || $last_name == "") {
    header("Location: actualizar.php");
    exit();
}

$sql = "UPDATE client_airport SET last_name='$last_name' WHERE id=$id";

if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
} elseif (mysqli_affected_rows($conn) == 0) {
    echo "Record doesn't exist or data is the same. Impossible to update it.";
} else {
    echo "Record updated successfully";
}

mysqli_close($conn);
?>

<?php include("./footer.html"); ?>