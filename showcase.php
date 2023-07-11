<?php
include "./include/navbar.inc.php";
include './classes/database.class.php';
include './classes/showcase.class.php';
include './include/showcase.inc.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>

<body>
    <h1>All Blog:</h1>
    <?php foreach ($posts as $post) { ?>
        <fieldset>
            <legend><?php
                    $name = $showcase->getName($post["users_id"]);
                    echo $name["full_name"];
                    ?></legend>
            <h3><?php echo $post['Title'] ?></h3>
            <h5><?php echo $post['time'] ?></h5>
            <p><?php echo $post['body'] ?></p>
        </fieldset>
    <?php } ?>
</body>

</html>