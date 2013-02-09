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

    public function findAll()
    {
        $query = $this->con->prepare("SELECT * FROM locations");
        $query->execute();
        $datas = $query->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($datas as $cur) {
            $date = ($cur['created_at'] != '0000-00-00 00:00:00') ? new \DateTime($cur['created_at']) : null;
            $this->locations[$cur['id']] = new Location($cur['id'], $cur['name'], $date);
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
            return new Location($cur['id'], $cur['name'], $date);
        }

        return null;
    }
    
}