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
    $email = $_POST["email"];
    $password = $_POST["pswd"];
    
    // SQL query to retrieve user data based on the provided email
    $checkUserQuery = "SELECT * FROM signup WHERE email='$email'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows == 1) {
        // User with provided email exists, fetch user data
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];
        
        // Check if the provided password matches the stored password (without hashing)
        if ($password === $storedPassword) {
            echo "Login successful!";
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Email not found. Please check your email or sign up.";
    }
}

// Close the database connection
$conn->close();
?>
