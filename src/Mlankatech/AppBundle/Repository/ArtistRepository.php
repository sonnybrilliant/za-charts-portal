<?php

namespace Mlankatech\AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class ArtistRepository extends EntityRepository
{
    public function getAllQueryList($options)
    {
        $defaultOptions = array(
            'search' => '',
            'show' => 10,
            'sort' => 'artist.id',
            'direction' => 'desc',
            'is_admin' => false,
            'filterBy' => 0
        );
        foreach ($options as $key => $values) {
            if (!$values) {
                $options[$key] = $defaultOptions[$key];
            }
        }
        $qb = $this->createQueryBuilder('artist')
            ->select('artist')
            ->innerJoin('artist.recordLabel', 'r');

//        if (!$options['is_admin']) {
//            $qb->andWhere('i.organisation =:organisation')
//                ->setParameter('organisation', $options['organisation']);
//        }else{
//            if ($options['filterBy'] != 0) {
//                $qb->andWhere('i.organisation =:organisation')
//                    ->setParameter('organisation', $options['organisation']);
//            }
//        }

        // search
//        if ($options['search']) {
//            if ($options['search'] != '') {
//                $qb->andWhere($qb->expr()->orx(
//                    $qb->expr()->like('ar.batch', $qb->expr()->literal('%'.$options['search'].'%'))
//                ));
//            }
//        }
        $qb->orderBy($options['sort'], $options['direction']);
        return $qb->getQuery();
    }
}