<?php



$userId = $_SESSION['userid'];



$profile = new Profile($userId);
$userData = $profile->userInfo();
$posts = $profile->userPost();
