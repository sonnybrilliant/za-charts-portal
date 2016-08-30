<?php

namespace Mlankatech\AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class StatusRepository extends EntityRepository
{
    public function getByCode($code)
    {
        $qb = $this->createQueryBuilder('status')
                   ->where('status.code = :code')
                   ->setParameter('code',$code);

        return $qb->getQuery()->getSingleResult();
    }
}