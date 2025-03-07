<?php
session_start();  // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egzaminac";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Date = $_POST["Data"];
    $Osoby = trim($_POST["Osoby"]);
    $Phone = trim($_POST["Phone"]);

    if (!empty($Date) && !empty($Osoby) && !empty($Phone)) {
        $stmt = $conn->prepare("INSERT INTO rezerwacje (data_rez, liczba_osob, telefon) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $Date, $Osoby, $Phone);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Rezerwacja udana!";
        } else {
            $_SESSION['message'] = "Błąd: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['message'] = "Wszystkie pola muszą być wypełnione!";
    }

    $conn->close();

    // Redirect to the same page to prevent resubmission
    header("Location: index.php");
    exit();
}
?>
