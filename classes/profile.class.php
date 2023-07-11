<?php
class Profile extends Database
{
    private $userId;
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function userInfo()
    {
        $statement = $this->connect()->prepare('SELECT * FROM user WHERE id =?');

        if (!$statement->execute([$this->userId])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function userPost()
    {
        $statement = $this->connect()->prepare('SELECT * FROM posts WHERE users_id =?');
        if (!$statement->execute([$this->userId])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
    public function deletePost($post_id)
    {
        $statement = $this->connect()->prepare('DELETE FROM posts WHERE post_id = ?');
        if (!$statement->execute([$post_id])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed1");
            exit();
        }

        $statement = null;
        header("Location: ../profile.php?error=deleted");

        exit();
    }
}
