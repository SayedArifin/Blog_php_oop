<?php
class Showcase extends Database
{
    public function showPost()
    {
        $statement = $this->connect()->prepare('SELECT * FROM posts');
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    public function getName($id)
    {
        $statement = $this->connect()->prepare('SELECT full_name FROM user WHERE id =?');
        $statement->execute([$id]);
        $posts = $statement->fetch(PDO::FETCH_ASSOC);
        return $posts;
    }
}
