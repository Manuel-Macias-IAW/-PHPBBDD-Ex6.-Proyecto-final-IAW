<?php include("sesion.php"); ?>

<?php
include("config.php");

set_time_limit(0);

$csv_file = 'C:\xampp\htdocs\bd\MOCK_DATA.csv';

if (file_exists($csv_file)) {
    if (($handle = fopen($csv_file, "r")) !== FALSE) {
        
        fgetcsv($handle); 

        $deleted_count = 0;


        mysqli_begin_transaction($conn);

        try {
            // Recorremos el archivo
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                
                if (isset($data[2])) {
                    $email = mysqli_real_escape_string($conn, $data[2]);

                    $sql = "DELETE FROM client_airport WHERE email = '$email'";
                    mysqli_query($conn, $sql);
                    
                    if (mysqli_affected_rows($conn) > 0) {
                        $deleted_count++;
                    }
                }
            }

            mysqli_commit($conn);
            
            echo "<div class='alert alert-success'>Mass deletion completed successfully. $deleted_count records removed.</div>";

        } catch (Exception $e) {
            mysqli_rollback($conn);
            echo "<div class='alert alert-danger'>Error during deletion. Changes rolled back. Error: " . $e->getMessage() . "</div>";
        }
        
        fclose($handle);
        
    } else {
        echo "<div class='alert alert-danger'>Error: Could not open the CSV file.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Error: CSV file not found at: $csv_file</div>";
}

mysqli_close($conn);
?>

<?php include("./footer.html"); ?>