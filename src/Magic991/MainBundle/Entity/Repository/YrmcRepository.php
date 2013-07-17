<?php

namespace Magic991\MainBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class YrmcRepository extends EntityRepository
{
    public function getYrmc()
    //$gid is above param passed in if narrowing
    {
        $qb = $this->createQueryBuilder('y')
                ->select('y')
                //->where('g.id = :gid')
                ->addOrderBy('y.created', 'ASC');
                //->setParameter('gid', $gid);
                $qb->setMaxResults(1);
        
        return $qb->getQuery()
                       ->getResult();
    }
}
