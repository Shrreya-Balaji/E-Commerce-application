<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dress Shopping</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            position: relative;
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
           
    background-image: url('bg3.jpg'); 
    background-size: cover;
    background-repeat: no-repeat;

        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        #viewOrdersButton {
            position: absolute;
            top: 10px;
            right: 100px;
            background-color: #555;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

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

        .dress-collection {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .dress-item {
            text-align: center;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
            max-width: 200px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dress-item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        button {
            background-color: black;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #00506b;
        }
    </style>
</head>
<body>
    <h1>MYNTRA SHOPPING MART</h1>

    <!-- Add the "View Orders" button in the top-right corner -->
    <button id="viewOrdersButton" onclick="viewOrders()">View Orders</button>
    <button id="logoutbutton" onclick="log_out()">Logout</button>


    <div class="dress-collection">
        <?php
        include 'db_conn.php';

        session_start();
        if (!isset($_SESSION['id'])) {
            echo "Not authenticated";
            exit();
        }
        $user_id = $_SESSION['id'];

        #$sql = "SELECT * FROM dresses";
        $sql = "SELECT * FROM dresses WHERE availability = TRUE";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='dress-item'>";
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='" . $row['name'] . "'>";
                echo "<p>" . $row['name'] . "</p>";
                echo "<p>Rs." . $row['price'] . "</p>";
                echo "<button onclick='addToCart(" . $row['dress_id'] . ", \"" . $row['name'] . "\", " . $row['price'] . ")'>Place order</button>";
                echo "</div>";
            }
        } else {
            echo "No dresses available.";
        }

        $conn->close();
        ?>
    </div>

    <script>
        function addToCart(dressId, dressName, dressPrice) {
            alert('Your order has been placed: Dress ID ' + dressId);

            // Redirect to the server-side script for order placement
            window.location.href = "add_to_cart.php?dress_id=" + dressId + "&dress_name=" + encodeURIComponent(dressName) + "&dress_price=" + dressPrice;
        }

        function viewOrders() {
            window.location.href = "history.php";
        }

        function log_out() {
            window.location.href = "logout.php";
        }
    </script>
</body>
</html>
