<?php
if (isset($_POST['login_submit']) && $_POST['login_submit']) {
    $user_idendity = htmlspecialchars($_POST['user_identity']);
    $user_password = htmlspecialchars($_POST['user_password']);
} else {
    header('location:../index.php');
}

include '../classes/database.class.php';
include '../classes/login.class.php';
include '../classes/loginContr.class.php';

$login = new LoginContr($user_idendity, $user_password);
$login->LoginUser();
