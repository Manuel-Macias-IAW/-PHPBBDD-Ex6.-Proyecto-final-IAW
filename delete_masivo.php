<?php include("sesion.php"); ?>

<?php
include("db_connect.php");

// Ruta del archivo CSV para saber qué borrar
$csv_file = 'C:\xampp\htdocs\bd\MOCK_DATA.csv';

if (file_exists($csv_file)) {
    if (($handle = fopen($csv_file, "r")) !== FALSE) {
        
        // 1. Saltamos la cabecera
        fgetcsv($handle); 

        $deleted_count = 0;
        
        // 2. Recorremos el archivo
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            // Nos aseguramos de que la fila tiene el campo email
            if (isset($data[2])) {
                // El email es el identificador único (índice 2)
                $email = mysqli_real_escape_string($conn, $data[2]);

                // Borramos solo el registro que coincida con este email
                $sql = "DELETE FROM client_airport WHERE email = '$email'";

                if (mysqli_query($conn, $sql)) {
                    // Contamos solo si realmente se borró algo (por si ya estaba borrado)
                    if (mysqli_affected_rows($conn) > 0) {
                        $deleted_count++;
                    }
                }
            }
        }
        
        fclose($handle);

        if ($deleted_count > 0) {
            echo "<div class='alert alert-success'>Mass deletion completed. $deleted_count records removed from the table.</div>";
        } else {
            echo "<div class='alert alert-warning'>No records were deleted. It seems the data from the CSV was not in the database.</div>";
        }
        
    } else {
        echo "<div class='alert alert-danger'>Error: Could not open the CSV file to read the IDs.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Error: CSV file not found at: $csv_file</div>";
}

// Cerrar conexión
mysqli_close($conn);
?>

<?php include("./footer.html"); ?>