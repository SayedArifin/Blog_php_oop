<?php
class Login extends Database
{
    protected function getUser($username, $password)
    {
        $statement = $this->connect()->prepare('SELECT password FROM user WHERE username = ? OR email = ?');

        if (!$statement->execute([$username, $username])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }
        if ($statement->rowCount() == 0) {
            $statement = null;
            header("Location: ../index.php?error=usernotfound");

            exit();
        }

        $passwordHashed  = $statement->fetch(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed['password']);

        if (!$checkPassword) {
            header("Location: ../index.php?error=wrongPassword");
            exit();
        } elseif ($checkPassword) {
            $statement = $this->connect()->prepare('SELECT * FROM user WHERE username = ? OR email = ? AND password = ?');

            if (!$statement->execute([$username, $username, $passwordHashed['password']])) {
                $statement = null;
                header("Location: ../index.php?error=statementFailed");
                exit();
            }

            $user = $statement->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['userid'] = $user["id"];
            header('Location: ../showcase.php');
            $statement = null;
        }
    }
}
