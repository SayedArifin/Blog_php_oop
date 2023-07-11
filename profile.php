<?php
include "./include/navbar.inc.php";
include "./classes/database.class.php";
include './classes/profile.class.php';
include "./include/profile.inc.php";
$image = $userData['avatar'];
$dataUrl = 'data:image/jpeg;base64,' . base64_encode($image);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile Page</title>
</head>

<body>
    <div>
        <img src="<?php echo $dataUrl; ?>" alt="Image" width="150" height="150">
    </div>
    <div>
        <h1><?php echo $userData['full_name'] ?></h1>
        <p><?php echo '@' . $userData['username'] ?></p>
        <p><?php echo 'Email:' . $userData['email'] ?></p>
    </div>
    <form action="./include/post_upload.inc.php" method="post">
        <fieldset>
            <h3>Upload a post:</h3>
            <label for="title">Title:</label>
            <input type="text" name="title" placeholder="Post title here.." required>
            <label for="body">Body:</label>
            <textarea id="body" name="body" placeholder="Description here.." required></textarea>
            <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>
    <h2>Posts</h2>
    <?php foreach ($posts as $post) { ?>
        <div>
            <h3><?php echo $post['Title']; ?></h3>
            <h6><?php echo 'at ' . date('Y-m-d H:i:s', strtotime($post['time'])); ?></h6>
            <p><?php echo $post['body']; ?></p>
            <form action="./include/delete.inc.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>">
                <input type="submit" value="delete the post" />
            </form>
        </div>
    <?php } ?>


</body>

</html>