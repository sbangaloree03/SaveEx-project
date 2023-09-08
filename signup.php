<?php
// Database connection settings
$servername = "localhost"; // Change to your MySQL server name
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "project"; // Change to your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["txt"];
    $email = $_POST["email"];
    $password = $_POST["pswd"];
    $phone = $_POST["phone"];

    // SQL query to insert data into the signup_table
    $sql = "INSERT INTO signup (username, email, password, phone) VALUES ('$username', '$email', '$password', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
