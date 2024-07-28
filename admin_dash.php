<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dress Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
            background-image: url('bg3.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
        }

        h1 {
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            width: 80%;
        }

        .button {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            
        }

        .add-button {
            background-color: #000;
            color: white;
            text-decoration: none;
        }

        .remove-button {
            background-color: #000;
            color: white;
            text-decoration: none;
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
    </style>
</head>
<body>
    <h1>Dress Details</h1>

    <button id="logoutbutton" onclick="log_out()">Logout</button>
    <script>
    function log_out() {
            window.location.href = "logout.php";
        }
    </script>
    <form id="removeForm" action="remove_items.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Dress ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Availability</th>
                    <th>Select</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_conn.php';

                // Fetch dress details from the database
                $sql = "SELECT * FROM dresses";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['dress_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>Rs." . $row['price'] . "</td>";
                        echo "<td>" . ($row['availability'] ? 'Available' : 'Not Available') . "</td>";
                        echo "<td><input type='checkbox' name='selectedItems[]' value='" . $row['dress_id'] . "'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No dresses available.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <div class="button-container">
            <a href="upload_form.php" class="button add-button">Add Item</a>
            <button type="button" class="button remove-button" onclick="removeItems()">Update Item</button>
        </div>
    </form>

    <script>
        function removeItems() {
            // Submit the form to remove selected items
            document.getElementById("removeForm").submit();
        }
    </script>
</body>
</html>
