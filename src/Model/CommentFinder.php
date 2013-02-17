<?php

namespace Model;

class CommentFinder implements FinderInterface
{

    private $con;

    private $comments;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function findAll()
    {
        $sth = $this->con->prepare("SELECT * FROM comments");
        $sth->execute();
        $datas = $sth->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($datas as $cur) {
            $this->comments[$cur['id']] = $this->maj($cur);
        }

        return $this->comments;
    }

    public function findOneById($id)
    {
        $sth = $this->con->prepare("SELECT * FROM comments WHERE id = :id");
        $sth->bindValue(':id', $id);
        $sth->execute();
        $cur = $sth->fetch(\PDO::FETCH_ASSOC);

        if (!empty($cur)) {
            return $this->maj($cur);
        }

        return null;
    }

    public function findAllForLocation(Location $location)
    {
        $sth = $this->con->prepare("SELECT * FROM comments WHERE location_id = :location_id ORDER BY created_at DESC");
        $sth->bindValue(':location_id', $location->getId());
        $sth->execute();
        $datas = $sth->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($datas as $cur) {
            $this->comments[$cur['id']] = $this->maj($cur);
        }

        return $this->comments;
    }

    private function maj($cur)
    {
        $date = (null === $cur['created_at']) ? null : new \DateTime($cur['created_at']);
        $comment = new Comment($cur['username'],$cur['body'], $date);
        $comment->setId($cur['id']);

        return $comment;
    }

}
