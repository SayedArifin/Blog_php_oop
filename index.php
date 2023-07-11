<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger</title>
</head>

<body>
    <h1>Welcome to Blogger</h1>
    <form action="./include/login_data.inc.php" method="post">
        <fieldset>
            <legend>please login to continue:</legend>
            <label for="user_idendity">Enter your username or email address:</label>
            <input type="text" name="user_identity" placeholder="please enter your username or email address" required><br><br>
            <label for="user_password">Enter your password:</label>
            <input type="password" name="user_password" placeholder="please enter your password" required><br><br>
            <input type="submit" name="login_submit" value="Login Now">
            <p> Dont have an account ? <a href="./signup.php">Signup now</a></p>
        </fieldset>
    </form>
</body>

</html>