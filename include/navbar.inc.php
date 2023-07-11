<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: ./index.php');
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <tr>
        <td><a href="./include/logout.inc.php">Logout </a></td>
        <td><a href="/profile.php">Profile </a></td>
        <td><a href="/showcase.php">All Posts </a></td>
    </tr>
</body>

</html>