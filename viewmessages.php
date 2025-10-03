<?php
$conn = new mysqli("localhost", "root", "", "tailorshop");

$result = $conn->query("SELECT * FROM contact_messages ORDER BY submitted_at DESC");

echo "<h2>📩 Customer Messages</h2>";

while($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row['name'] . "</strong> (" . $row['email'] . ", " . $row['mobno'] . ")<br>";
    echo $row['message'] . "<br><em>Submitted: " . $row['submitted_at'] . "</em></p><hr>";
}
?>