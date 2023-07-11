<?php


class Signup extends Database
{
    protected function setUser($name, $username, $email, $password, $profilePicture)
    {
        $imageData = file_get_contents($profilePicture['tmp_name']);

        $statement = $this->connect()->prepare('INSERT INTO `user` (`id`, `full_name`, `username`, `email`, `password`, `avatar`) VALUES (NULL, ?, ?, ?, ?, ?)');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$statement->execute([$name, $username, $email, $hashedPassword, $imageData])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }

        $statement = null;
        session_start();
        header("Location: ../index.php");
    }
    protected function checkUser($username, $email)
    {
        $statement = $this->connect()->prepare('SELECT username FROM user WHERE username = ? or email = ?;');
        if (!$statement->execute([$username, $email])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
