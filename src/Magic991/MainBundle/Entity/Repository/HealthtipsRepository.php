<?php

namespace Magic991\MainBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class HealthtipsRepository extends EntityRepository
{
    public function getHealthtips()
    //$gid is above param passed in if narrowing
    {
        $qb = $this->createQueryBuilder('h')
                ->select('h')
                //->where('g.id = :gid')
                ->addOrderBy('h.created', 'ASC');
                //->setParameter('gid', $gid);
                $qb->setMaxResults(1);
        
        return $qb->getQuery()
                       ->getResult();
    }
}
