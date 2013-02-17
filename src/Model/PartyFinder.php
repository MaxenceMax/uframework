<?php 

namespace Model;

use Exception\HttpException;

class PartyFinder implements FinderInterface
{

    private $con;

    private $parties;
    
    private $serializer;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function findAll()
    {
    	$requete = "SELECT * FROM party";
    	$query = $this->con->prepare($requete);
        $query->execute();
        $datas = $query->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($datas as $cur) {
            $this->parties[$cur['id']] = $this->hydrate($cur);
        }

        return $this->parties;
    }

    public function findOneById($id)
    {
        $sth = $this->con->prepare("SELECT * FROM party WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        $cur = $sth->fetch(\PDO::FETCH_ASSOC);

        if (!empty($cur)) {
            return $this->hydrate($cur);
        }

        return null;
    }

    public function findAllForLocation(Location $location)
    {
        $sth = $this->con->prepare("SELECT * FROM party WHERE location_id = :location_id ORDER BY party_time DESC");
        $sth->bindValue(':location_id', $location->getId());
        $sth->execute();
        $datas = $sth->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($datas as $cur) {
            $this->parties[$cur['id']] = $this->hydrate($cur);
        }

        return $this->comments;
    }

    public function hydrate($cur)
    {
    	$date = (null === $cur['party_time']) ? null : new \DateTime($cur['party_time']);
        $party = new Party($cur['username'], $cur['body'], $date);
        $party->setId($cur['id']);

        return $party;

    }
}
