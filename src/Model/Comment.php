<?php

namespace Model;

class Comment
{

    private $id;

    private $username;

    private $body;

    private $created_at;

    private $location_id;

    public function __construct($username, $body, \DateTime $created_at=null,$location_id=null)
    {
        $this->username = strip_tags($username);
        $this->body     = strip_tags($body);
        $this->location_id = $location_id;
        if(empty($created_at))
            $this->created_at = new \DateTime();
        else
            $this->created_at = $created_at;    
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getLocationId()
    {
        return $this->location_id;
    }

    public function setLocationId($id)
    {
        return $this->location_id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = strip_tags($username);
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = strip_tags($body);
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

}
