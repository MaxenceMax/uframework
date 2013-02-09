<?php 

namespace Model;

class Location
{
	/**
	* Location ID
	*/
	private $id;

	/**
	* Location Name
	*/
	private $name;
	/**
	* Location Date
	*/
	private $created_at;

    private $comments;

	public function __construct($id, $name, \DateTime $created_at=null)
    {
        $this->id   = $id;
        $this->name = strip_tags($name);

        if (empty($created_at))
            $this->created_at = new \DateTime();
        else
            $this->created_at = $created_at;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = strip_tags($name);
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }

}
