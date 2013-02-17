<?php

namespace Model;

class CommentDataMapper
{
    private $con;
    
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }


    public function persist($comment)
    {
        if (null === $comment->getId()) {
            $this->con->executeQuery("INSERT INTO comments (location_id,username,body,created_at) VALUES (:location_id, :username,:body,:created_at)",
                    array('location_id'=> $comment->getLocationId(),"username"=>$comment->getUsername(),"body"=>$comment->getBody(),'created_at' => $comment->getCreatedAt()->format('Y-m-d H:i:s')));
            return $this->con->lastInsertId();
        }
        else {
            $this->con->executeQuery("UPDATE comments SET username= :username, body =:body WHERE id = :id",
                    array("username"=>$comment->getUsername(),"body"=>$comment->getBody()));
            return $location->getId();
        }
    }

    public function remove($comment)
    {
        $this->con->executeQuery("DELETE FROM comments WHERE id = :id",array('id' => $comment->getId()));
    }

}
