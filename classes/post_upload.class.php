<?php
class PostUpload extends Database
{
    protected function Upload($userid, $post_title, $post_body)
    {
        $statement = $this->connect()->prepare('INSERT INTO `posts` (`post_id`, `users_id`, `Title`, `body`) VALUES (NULL, ?, ?, ?)');
        if (!$statement->execute([$userid, $post_title, $post_body])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }
        $statement = null;
    }
}
