<?php

namespace Model;

class Party
{
    private $id;
    private $location_id;
    private $message;
    private $createdAt;

	public function __construct($message,$createdAt)
	{
		$this->id = $id;
		$this->idLoc = $idLoc;
		$this->desc = $desc;
		$this->createdAt = $createdAt;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getIdLoc()
	{
		return $this->location_id;
	}
	
	public function getMessage()
	{
		return $this->message;
	}
	
	public function getCreatedAt()
	{
		return $this->createdAt;
	}
}
