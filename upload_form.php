<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD ITEM</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: left;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            align-items:center;
        }

        button:hover {
            background-color: #45a049;
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
    <h1>Add Dress</h1>

    <button id="logoutbutton" onclick="log_out()">Dashboard</button>
    <script>
    function log_out() {
            window.location.href = "admin_dash.php";
    }
    </script>
    
    <form action="upload_image.php" method="post" enctype="multipart/form-data">
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" required>
        <br>
        <label for="name">Dress Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="price">Dress Price:</label>
        <input type="text" name="price" id="price" required>
        <br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
