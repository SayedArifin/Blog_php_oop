<?php
include '../classes/database.class.php';
include '../classes/signup.class.php';
include '../classes/signupContr.class.php';

if (isset($_POST['signup_submit']) && $_POST['signup_submit']) {
    $full_name = htmlspecialchars($_POST['full_name']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    $profile_picture = $_FILES["profile_picture"];
} else {
    header('location:../index.php');
}

$signup = new SignupContr($full_name, $username, $email, $password, $confirm_password, $profile_picture);
$signup->SignupUser();
header('Location:../index.php?error=none');
