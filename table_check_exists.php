<?php include("sesion.php"); ?>

<?php
include("config.php");


// 1. Consulta para verificar si la tabla existe
$sql = "SHOW TABLES LIKE 'client_airport'";
$result = mysqli_query($conn, $sql);

// Verificar el resultado de la comprobación
if (mysqli_num_rows($result) == 0) {
    // 2. Si mysqli_num_rows devuelve 0, la tabla NO existe
    echo "Aviso: La tabla **client_airport** no existe. No se puede visualizar.";
    // Puedes terminar aquí o simplemente omitir la consulta
}
else{
echo "Aviso: La tabla **client_airport** existe.";
}


// Close connection
mysqli_close($conn);
?> 

<?php include("./footer.html"); ?>
