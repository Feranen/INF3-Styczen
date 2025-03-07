<?php
// Connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egzaminac";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Variable to store the message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $Date = $_POST["Data"];
    $Osoby = trim($_POST["Osoby"]);
    $Phone = trim($_POST["Phone"]);

    if (!empty($Date) && !empty($Osoby) && !empty($Phone)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO rezerwacje (data_rez, liczba_osob, telefon) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $Date, $Osoby, $Phone);

        // Execute the query
        if ($stmt->execute()) {
            $message = "Rezerwacja udana!";
        } else {
            $message = "Błąd: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Wszystkie pola muszą być wypełnione!";
    }
}

$conn->close();

// Output the message for use in the HTML page
echo $message;
?>
