<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-image: url('bg2.jpg'); 
    background-size: cover;
    background-repeat: no-repeat;
            position: relative;
        }

        #adminLoginButton {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        button{
            background-color: black;
        }
    </style>
</head>
<body>
    <form action="ad_log_check.php" method="post">
        <h2>ADMIN LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
        <!--<a href="signup.php" class="ca">Register here</a>-->

        <!-- Admin Login Button -->
        <!--<a href="admin_login.php" id="adminLoginButton">Admin Login</a>-->
    </form>
</body>
</html>
