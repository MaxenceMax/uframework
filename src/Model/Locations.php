<?php

namespace Model

class Locations implements Model\FinderInterface.php
{
	/**
	*La liste des locations
	*/
	protected $locations = array("Grazac","Laptes","Yssingeaux","Le puy en velay");
	
	
	/**
	*
	*/
	public function create($location)
	{
		$this->locations[$id]= $location;
	}
	
	
	
}