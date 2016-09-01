<?php

namespace Mlankatech\AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class RadioStationStreamRepository extends EntityRepository
{
    public function getAllQueryList($options)
    {
        $defaultOptions = array(
            'search' => '',
            'show' => 10,
            'sort' => 'r.id',
            'direction' => 'desc',
            'is_admin' => false,
            'filterBy' => 0
        );
        foreach ($options as $key => $values) {
            if (!$values) {
                $options[$key] = $defaultOptions[$key];
            }
        }
        $qb = $this->createQueryBuilder('r')
            ->select('r')
            ->innerJoin('r.radioStation', 'station');

        $qb->orderBy($options['sort'], $options['direction']);
        return $qb->getQuery();
    }
}