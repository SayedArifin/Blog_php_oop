<?php
class UploadContr extends PostUpload
{
    private $userid;
    private $title;
    private $body;
    public function __construct($userid, $title, $body)
    {
        $this->userid = $userid;
        $this->title = $title;
        $this->body = $body;
    }

    public function Postupload()
    {
        if (empty($this->userid) || empty($this->title) || empty($this->body)) {
            header("Location: ../index.php?error=inputEmpty");
            exit();
        } else {
            $this->Upload($this->userid, $this->title, $this->body);
            header("Location: ../profile.php");
        }
    }
}
