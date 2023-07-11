<?php
include '../classes/database.class.php';
include '../classes/profile.class.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['post_id'])) {
        $postID = $_POST['post_id'];

        session_start();

        $userId = $_SESSION['userid'];
        $profile = new Profile($userId);
        $profile->deletePost($postID);
        exit();
    } else {
        echo "no";
    }
}
