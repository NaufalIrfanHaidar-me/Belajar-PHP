<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="POST">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) {?>
            <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>
        <label>Username</label><br>
        <input type="text" name="uname" placeholder="Username"><br>

        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>