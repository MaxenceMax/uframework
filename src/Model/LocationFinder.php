<?php 

namespace Model;

use Exception\HttpException;

class LocationFinder implements FinderInterface
{

    private $con;

    private $locations;
    
    private $serializer;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function findAll($critere = null)
    {

        $requete = "SELECT * FROM locations";
        $colAllowed = array("id","name","created_at");

        if(null !== $critere)
        {
            if(!empty($critere["orderBy"]))
            {
                if(in_array($critere["orderBy"], $colAllowed))
                {
                    $requete .= " ORDER BY ".$critere["orderBy"];   
                }
                else
                {
                    return null;
                }
            }
            if(!empty($critere["limit"]))
            {
                $requete .= " LIMIT 0, ".$critere["limit"];
            }
        }
        $query = $this->con->prepare($requete);
        $query->execute();
        $datas = $query->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($datas as $cur) {
            $date = ($cur['created_at'] != '0000-00-00 00:00:00') ? new \DateTime($cur['created_at']) : null;
            $this->locations[$cur['id']] = new Location($cur['id'], $cur['name'], $date,$cur['phone'],$cur['address'],$cur['presentation']);
        }

        return $this->locations;
    }

    public function findOneById($id)
    {
        $query = $this->con->prepare("SELECT * FROM locations WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();
        $cur = $query->fetch(\PDO::FETCH_ASSOC);

        if (!empty($cur)) {
            $date = ($cur['created_at'] != '0000-00-00 00:00:00') ? new \DateTime($cur['created_at']) : null;
            return new Location($cur['id'], $cur['name'], $date,$cur['phone'],$cur['address'],$cur['presentation']);
        }

        return null;
    }

    public function findLastFive()
    {
        $requete = "SELECT * FROM locations ORDER BY created_at DESC LIMIT 0,5";
        $query = $this->con->prepare("SELECT * FROM locations");
        $query = $this->con->prepare($requete);
        $query->execute();
        $datas = $query->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($datas as $cur) {
            $date = ($cur['created_at'] != '0000-00-00 00:00:00') ? new \DateTime($cur['created_at']) : null;
            $this->locations[$cur['id']] = new Location($cur['id'], $cur['name'], $date,$cur['phone'],$cur['address'],$cur['presentation']);
        }

        return $this->locations;

    }
    
}