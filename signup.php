<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger</title>
</head>

<body>
    <h1>Welcome to Blogger</h1>
    <form method="post" action="./include/signup_data.inc.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Signup now:</legend>
            <label for="full_name">Enter your Full Name:</label>
            <input type="text" id="full_name" name="full_name" placeholder="Please enter your name" required><br><br>
            <label for="username">Enter your username:</label>
            <input type="text" id="username" name="username" placeholder="Please enter your username" required><br><br>
            <label for="email">Enter your Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Please enter your email address" required><br><br>

            <label for="password">Enter your password:</label>
            <input type="password" id="password" name="password" placeholder="Please enter your password" required><br><br>
            <label for="confirm_password">Repeat your password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Please repeat your password" required><br><br>
            <label for="profile_picture">Your Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" required><br><br>
            <input type="submit" name="signup_submit" value="Signup Now">
            <p>Don't have an account? <a href="./index.php">Login Now</a></p>
        </fieldset>
    </form>
</body>

</html>