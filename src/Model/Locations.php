<?php

namespace Model;

class Locations implements FinderInterface
{
	/**
	*La liste des locations
	*/
	private $locations = array("Grazac","Laptes","Yssingeaux","Le puy en velay");
	
	
	/**
	*
	*/
	public function create($location)
	{
		
		$this->locations[]= $location;
	}
	
	public function delete($id)
	{
		if(array_key_exists($id,$this->locations))
		{
			unset($this->locations[$id]);
			$this->locations = array_values($this->locations);
		}
		else
			throw new HttpException(404, "Location not foud");
	}
	
	public function findAll()
	{
		return $this->locations;
	}
	
    /**
     * Retrieve an element by its id.
     *
     * @param  mixed      $id
     * @return null|mixed
     */
    public function findOneById($id)
	{
		if(!array_key_exists($id,$this->locations))
		{
			throw new HttpException(404,"Location not found");
		}
		$location[0] = $id;
		$location[1] = $this->locations[$id];
		return $location;
	}
	
	public function update($id, $values)
	{
		if(!array_key_exists($id,$this->locations))
		{
			throw new HttpException(404,"Location not found");
		}
		$this->locations[$id]=$values;
	}
}