<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login-style.css" type="text/css">
</head>
<body>
    <div class = "wrapper">
        <h1> Sign In </h1>
    <form action="login_process.php" method="post">

        <div class="input-box">
        <label>Email:</label><br>
        <input type="text" name="user_email"><br><br>
    </div>

    <div class="input-box">
        <label>Password:</label><br>
        <input type="password" name="user_password"><br><br>
    </div>

        <input type="submit" class="btn" value="Login">

    </form>

</div>
</body>
</html>
