<?php
$servername = "localhost";
$username   = "root";      // XAMPP default
$password   = "";          // no password
$dbname     = "tailorshop";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data safely
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $mobno   = $conn->real_escape_string($_POST['mobno']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into DB
    $sql = "INSERT INTO contact_messages (name, email, mobno, message) 
            VALUES ('$name', '$email', '$mobno', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color:green;'>✅ Thank you, $name! Your message has been saved successfully.</h2>";
        echo "<a href='index.html'>Go Back</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
$conn->close();
?>
