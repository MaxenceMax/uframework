<?php

namespace Model;

class PartyMapper
{
    private $con;
    
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }


    public function persist($party)
    {
        if (null === $comment->getId()) {
            $this->con->executeQuery("INSERT INTO party (location_id,message,party_time) VALUES (:location_id,:message,:party_time)",array('location_id'=> $party->getLocationId(),'message'=>$party->getMessage(),'party_time' => $party->getPartyTime()->format('Y-m-d H:i:s')));
            return $this->con->lastInsertId();
        }
        else {
            $this->con->executeQuery("UPDATE party SET message= :message, party_time =:party_time WHERE id = :id",
                    array('message'=>$party->getMessage(),'party_time' => $party->getPartyTime()->format('Y-m-d H:i:s')));
            return $party->getId();
        }
    }

    public function remove($party)
    {
        $this->con->executeQuery("DELETE FROM party WHERE id = :id",array('id' => $party->getId()));
    }

}
