<?php include("sesion.php"); ?>

<?php
include("config.php");

// Ruta del archivo CSV
$csv_file = 'C:\xampp\htdocs\bd\MOCK_DATA.csv';

if (file_exists($csv_file)) {
    if (($handle = fopen($csv_file, "r")) !== FALSE) {
        
        // 1. Saltamos la cabecera
        fgetcsv($handle); 

        // 2. Leemos SOLO la primera fila de datos para comprobar si ya se importó este archivo
        $first_data_row = fgetcsv($handle, 1000, ",");
        
        $already_imported = false;

        if ($first_data_row !== FALSE) {
            $check_email = mysqli_real_escape_string($conn, $first_data_row[2]);

            $check_sql = "SELECT id FROM client_airport WHERE email = '$check_email' LIMIT 1";
            $result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($result) > 0) {
                $already_imported = true;
            }
        }

        // 3. Decidimos qué hacer
        if ($already_imported) {
            echo "<div class='alert alert-warning'>Data from this CSV is already imported. (Checked email: $check_email)</div>";
        } else {
            
            // --- LOGICA PARA RELLENAR HUECOS DE ID ---
            // 1. Obtenemos todos los IDs existentes en un array para saber cuáles están ocupados
            $id_query = "SELECT id FROM client_airport";
            $id_result = mysqli_query($conn, $id_query);
            $occupied_ids = [];
            
            while ($row = mysqli_fetch_assoc($id_result)) {
                $occupied_ids[$row['id']] = true;
            }

            // Variable para rastrear el ID candidato, empezamos buscando desde el 1
            $candidate_id = 1;
            // -----------------------------------------

            rewind($handle); // Rebobinar al inicio del archivo
            fgetcsv($handle); // Volver a saltar la cabecera

            $success_count = 0;
            
            // Recorrer el archivo completo e insertar
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) >= 6) {
                    $first_name = mysqli_real_escape_string($conn, $data[0]);
                    $last_name  = mysqli_real_escape_string($conn, $data[1]);
                    $email      = mysqli_real_escape_string($conn, $data[2]);
                    $gender     = mysqli_real_escape_string($conn, $data[3]);
                    $city       = mysqli_real_escape_string($conn, $data[4]);
                    $airport_code = mysqli_real_escape_string($conn, $data[5]);

                    // Buscamos el siguiente ID libre (rellenando huecos)
                    while (isset($occupied_ids[$candidate_id])) {
                        $candidate_id++;
                    }
                    
                    // Usamos este ID libre
                    $final_id = $candidate_id;
                    
                    // Marcamos este ID como ocupado para la siguiente iteración del bucle
                    $occupied_ids[$final_id] = true;

                    // IMPORTANTE: Incluimos el 'id' en el INSERT
                    $sql = "INSERT INTO client_airport (id, first_name, last_name, email, gender, city, airport_code) 
                            VALUES ($final_id, '$first_name', '$last_name', '$email', '$gender', '$city', '$airport_code')";

                    if (mysqli_query($conn, $sql)) {
                        $success_count++;
                    }
                }
            }
            echo "<div class='alert alert-success'>Import completed successfully. $success_count records inserted</div>";
        }
        
        fclose($handle);

    } else {
        echo "<div class='alert alert-danger'>Error: Could not open the CSV file.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Error: CSV file not found at: $csv_file</div>";
}

// Cerrar conexión
mysqli_close($conn);
?>

<?php include("./footer.html"); ?>