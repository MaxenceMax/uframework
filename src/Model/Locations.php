<?php

namespace Model;

class Locations implements FinderInterface
{
	/**
	*La liste des locations
	*/
	private $locations;
	
	public function __construct()
	{
		$string = file_get_contents("./../data/locations.json");
		$this->locations = json_decode($string,true);
	}
	
	private function saveJson()
	{
		$fp = fopen('./../data/locations.json', 'w');
		fwrite($fp, json_encode($this->locations));
		fclose($fp);
	}
	
	/**
	*
	*/
	public function create($location)
	{
		$this->locations[]= $location;
		$this->saveJson();
	}
	
	public function delete($id)
	{
		unset($this->locations[$id]);
		$this->locations = array_values($this->locations);
		$this->saveJson();
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
			return null;
		}
		$location[0] = $id;
		$location[1] = $this->locations[$id];
		return $location;
	}
	
	public function update($id, $values)
	{
		$this->locations[$id]=$values;
		$this->saveJson();
	}
}