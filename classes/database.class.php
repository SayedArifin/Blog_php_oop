<?php

class Database
{
    protected function connect()
    {
        try {
            $username = 'blog';
            $password = '123456';
            $conn = new PDO("mysql:host=localhost;dbname=blog", $username, $password);


            return $conn;
        } catch (PDOException $e) {
            print "Error!" . $e->getMessage() . "<br>";
            die();
        }
    }
}
