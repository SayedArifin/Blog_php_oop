<?php
session_start();
if (isset($_POST['submit']) && isset($_SESSION['userid'])) {
    $title = htmlspecialchars($_POST['title']);
    $body = htmlspecialchars($_POST['body']);
    $user_id = $_SESSION['userid'];
} else {
    header('Location: ../index.php');
    exit();
}

include "../classes/database.class.php";
include "../classes/post_upload.class.php";
include "../classes/uploadContr.class.php";

$upload = new UploadContr($user_id, $title, $body);
$upload->Postupload();
