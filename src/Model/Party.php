<?php

namespace Model;

class Party
{
    private $id;
    private $location_id;
    private $message;
    private $party_time;

	public function __construct($message,$createdAt,$location_id)
	{
		$this->location_id = $location_id;
		$this->message = $message;
		$this->createdAt = $createdAt;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getLocationId()
	{
		return $this->location_id;
	}
	
	public function getMessage()
	{
		return $this->message;
	}
	
	public function getPartyTime()
	{
		return $this->createdAt;
	}
}
