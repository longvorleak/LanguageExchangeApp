<?php

require_once("Manager.php");

class LoginManager extends Manager
{
    public function getLogin($article_id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM comments WHERE article_id = ? ORDER BY date_creation');
        $req->execute(array($article_id));
        $comments = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $comments;
    }
}
