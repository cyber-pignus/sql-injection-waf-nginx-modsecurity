<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username = " ";
$password = " ";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

$user = $_GET['user'];

$sql = "SELECT * FROM users WHERE username = '$user'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "Login success";
} else {
    echo "Login failed";
}

$conn->close();
?>
