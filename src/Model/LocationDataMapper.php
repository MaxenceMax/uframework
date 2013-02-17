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
            $this->con->executeQuery("INSERT INTO locations (name,created_at,address,phone,presentation) VALUES (:name, :created_at,:address,:phone,:presentation)",
                    array('name'=> $location->getName(),'created_at' => $location->getCreatedAt()->format('Y-m-d H:i:s'),"address"=>$location->getAdresse(),"phone"=>$location->getPhone(),"presentation"=>$location->getPresentation()));
            return $this->con->lastInsertId();
        }
        else {
            $this->con->executeQuery("UPDATE locations SET name = :name, address = :address, phone = :phone, presentation = :presentation WHERE id = :id",
                    array('id'=>$location->getId(),'name'=> $location->getName(),"phone"=>$location->getPhone(),"presentation"=>$location->getPresentation()));
            return $location->getId();
        }
    }

    public function remove($location)
    {
        $this->con->executeQuery("DELETE FROM locations WHERE id = :id",array('id' => $location->getId()));
    }

}
