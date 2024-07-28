<?php
include 'db_conn.php';

// Assume user authentication has been implemented, and the user ID is available in the session
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to the login page or handle unauthenticated user as needed
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

// Retrieve user's order history from the database
$sql = "SELECT * FROM orders WHERE user_id = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        #logoutbutton {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #555;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Order History</h1>
    <button id="logoutbutton" onclick="log_out()">Home</button>
    <script>
    function log_out() {
            window.location.href = "home.php";
        }
        </script>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='order-item'>";
            echo "<p>Order ID: " . $row['order_id'] . "</p>";
            echo "<p>Order Date: " . $row['order_date'] . "</p>";
            echo "<p>Product: " . $row['dress_name'] . "</p>";
            echo "<p>Price: Rs." . $row['dress_price'] . "</p>";
            // Add more order details as needed
            echo "</div>";
        }
    } else {
        echo "<p>No orders found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
