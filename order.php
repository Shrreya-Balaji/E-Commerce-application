<?php
include 'db_conn.php';

// Assume you have a cart system, and the order is placed from the cart
// Retrieve user's address details from the database or session
$userAddress = "123 Main St, Cityville, Country";

// Process the order (store in the database, send confirmation emails, etc.)

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Order Confirmation</h1>

    <p>Thank you for your order! Your dress will be shipped to the following address:</p>
    <p><?php echo $userAddress; ?></p>

    <!-- Additional order details can be displayed here -->

</body>
</html>
