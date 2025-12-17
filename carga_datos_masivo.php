<?php include("sesion.php"); ?>

<?php
include("config.php");

mysqli_select_db($conn, "bbdd_mmm_mockaroo");

set_time_limit(0);

$csv_file = 'C:\xampp\htdocs\bd\MOCK_DATA.csv';

if (file_exists($csv_file)) {
    if (($handle = fopen($csv_file, "r")) !== FALSE) {

        fgetcsv($handle);

        $first_data_row = fgetcsv($handle, 1000, ",");
        $already_imported = false;
        $check_email = "";

        if ($first_data_row !== FALSE) {
            $check_email = mysqli_real_escape_string($conn, $first_data_row[2]);

            $check_sql = "SELECT id FROM client_airport WHERE email = '$check_email' LIMIT 1";
            $result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($result) > 0) {
                $already_imported = true;
            }
        }

        if ($already_imported) {
            echo "<div class='alert alert-warning'>Data from this CSV is already imported. (Checked email: $check_email)</div>";
        } else {

            $id_query = "SELECT id FROM client_airport";
            $id_result = mysqli_query($conn, $id_query);
            $occupied_ids = [];

            while ($row = mysqli_fetch_assoc($id_result)) {
                $occupied_ids[$row['id']] = true;
            }

            $candidate_id = 1;

            rewind($handle);
            fgetcsv($handle);

            $success_count = 0;

            mysqli_begin_transaction($conn);

            try {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if (count($data) >= 6) {
                        $first_name = mysqli_real_escape_string($conn, $data[0]);
                        $last_name  = mysqli_real_escape_string($conn, $data[1]);
                        $email      = mysqli_real_escape_string($conn, $data[2]);
                        $gender     = mysqli_real_escape_string($conn, $data[3]);
                        $city       = mysqli_real_escape_string($conn, $data[4]);
                        $airport_code = mysqli_real_escape_string($conn, $data[5]);

                        while (isset($occupied_ids[$candidate_id])) {
                            $candidate_id++;
                        }

                        $final_id = $candidate_id;
                        $occupied_ids[$final_id] = true;

                        $sql = "INSERT INTO client_airport (id, first_name, last_name, email, gender, city, airport_code) 
                                VALUES ($final_id, '$first_name', '$last_name', '$email', '$gender', '$city', '$airport_code')";

                        mysqli_query($conn, $sql);
                        $success_count++;
                    }
                }

                mysqli_commit($conn);
                echo "<div class='alert alert-success'>Import completed successfully. $success_count records inserted (filling ID gaps).</div>";

            } catch (Exception $e) {
                mysqli_rollback($conn);
                echo "<div class='alert alert-danger'>Error during import: " . $e->getMessage() . "</div>";
            }
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