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
    /**
    * locations comments
    */
    private $comments;
    /**
    * locations parties
    */
    private $parties;
    /**
    * locations phone number
    */
    private $phone;
    /**
    * locations presentation
    */
    private $presentation;
    /**
    * locations presentation
    */
    private $address;

	public function __construct($id, $name, \DateTime $created_at=null,$phone,$address,$presentation)
    {
        $this->id   = $id;
        $this->name = strip_tags($name);
        $this->phone  = $phone;
        $this->address = $address;
        $this->presentation = $presentation;

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

    public function setComments($comments)
    {
        $this->comments = $comments;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    
    public function getAdresse()
    {
        return $this->address;
    }
    
    public function getComments()
    {
        return $this->comments;
    }
    
    public function getParty()
    {
        return $this->party;
    }
    
    public function getPresentation()
    {
        return $this->presentation;
    }

}
