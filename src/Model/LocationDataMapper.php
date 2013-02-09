<?php

namespace Model;

class LocationDataMapper
{
    private $con;
    
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }


    public function persist($location)
    {
        if (null === $location->getId()) {
            $this->con->executeQuery("INSERT INTO locations (name, created_at) VALUES (:name, :created_at)",
                    array('name'=> $location->getName(),'created_at' => $location->getCreatedAt()->format('Y-m-d H:i:s'),));
            return $this->con->lastInsertId();
        }
        else {
            $this->con->executeQuery("UPDATE locations SET name = :name WHERE id = :id",
                    array('id'=> $location->getId(),'name' => $location->getName(),));
            return $location->getId();
        }
    }

    public function remove($location)
    {
        $this->con->executeQuery("DELETE FROM locations WHERE id = :id",array('id' => $location->getId()));
    }

}
