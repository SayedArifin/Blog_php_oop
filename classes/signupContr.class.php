<?php

class SignupContr extends Signup
{
    private $name;
    private $username;
    private $email;
    private $password;
    private $repeatPassword;
    private $profilePicture;

    public function __construct($name, $username, $email, $password, $repeatPassword, $profilePicture)
    {
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
        $this->profilePicture = $profilePicture;
    }

    public function SignupUser()
    {
        if ($this->emptyInput()) {
            header("Location: ../index.php?error=emptyInput");
            exit();
        } elseif (!$this->validate_username()) {
            header("Location: ../index.php?error=username");
            exit();
        } elseif (!$this->validate_email()) {
            header("Location: ../index.php?error=validate_email");
            exit();
        } elseif (!$this->match_password()) {
            header("Location: ../index.php?error=match_password");
            exit();
        } elseif (!$this->validate_password()) {
            header("Location: ../index.php?error=validate_password");
            exit();
        } elseif (!$this->validate_profile_picture()) {
            header("Location: ../index.php?error=validate_profile_picture");
            exit();
        } elseif ($this->userTaken()) {
            header("Location: ../index.php?error=UserExists");
            exit();
        } else {
            $this->setUser($this->name, $this->username, $this->email, $this->password, $this->profilePicture);
        }
    }


    private function emptyInput()
    {
        if (empty($this->email) || empty($this->password) || empty($this->name) || empty($this->username) || empty($this->profilePicture)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function validate_username()
    {
        if (preg_match('/^[a-zA-Z0-9_]+$/', $this->username)) {
            if (strlen($this->username) >= 3 && strlen($this->username) <= 20) {
                $result = true;
            } else {
                $result = false;
            }
            return $result;
        }
    }

    private function validate_email()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function match_password()
    {
        if ($this->password == $this->repeatPassword) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    private function validate_password()
    {
        if (
            strlen($this->password) >= 8 &&
            preg_match('/[a-z]/', $this->password) &&
            preg_match('/[A-Z]/', $this->password) &&
            preg_match('/[0-9]/', $this->password) &&
            preg_match('/[\W]/', $this->password)
        ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function validate_profile_picture()
    {
        if (isset($this->profilePicture['name'])) {
            $fileSize = $this->profilePicture['size'];
            $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
            $fileExtension = strtolower(pathinfo($this->profilePicture['name'], PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $validExtensions)) {
                return false;
            }
            $maxFileSize = 2 * 1024 * 1024;
            if ($fileSize > $maxFileSize) {
                return false;
            }

            return true;
        }

        return false;
    }

    private function userTaken()
    {
        if (!$this->checkUser($this->username, $this->email)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}
