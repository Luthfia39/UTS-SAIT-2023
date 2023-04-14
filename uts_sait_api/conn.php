<?php 
    // connect database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sait_db_uts";
    
    $mysqli = mysqli_connect($servername, $username, $password, $database);
    if (!$mysqli) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>