<?php
include 'db_conn.php';

// Sample authentication check (you may need to adjust this based on your actual implementation)
session_start();
if (!isset($_SESSION['id'])) {
    echo "Not authenticated";
    exit();
}

// Get the user ID from the session or wherever you store it during authentication
$user_id = $_SESSION['id'];

// Get the dress details from the URL parameters
$dress_id = $_GET['dress_id'];
$dress_name = $_GET['dress_name'];
$dress_price = $_GET['dress_price'];

// Insert the item into the orders table
$sql = "INSERT INTO orders (user_id, dress_id, dress_name, dress_price, order_date) 
        VALUES ($user_id, $dress_id, '$dress_name', $dress_price, NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Your order has been placed successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
