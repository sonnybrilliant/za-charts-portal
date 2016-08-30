<?php

namespace Mlankatech\AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class SongRepository extends EntityRepository
{
    public function getAllQueryList($options)
    {
        $defaultOptions = array(
            'search' => '',
            'show' => 10,
            'sort' => 'song.id',
            'direction' => 'desc',
            'is_admin' => false,
            'filterBy' => 0
        );
        foreach ($options as $key => $values) {
            if (!$values) {
                $options[$key] = $defaultOptions[$key];
            }
        }
        $qb = $this->createQueryBuilder('song')
            ->select('song')
            ->innerJoin('song.artist', 'artist')
            ->innerJoin('song.status', 'status');

        $qb->orderBy($options['sort'], $options['direction']);
        return $qb->getQuery();
    }
}