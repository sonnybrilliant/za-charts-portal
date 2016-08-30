<?php

namespace Mlankatech\AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Mlankatech\AppBundle\Entity\Song;
use Psr\Log\LoggerInterface;

class SongService
{
    private $logger;
    private $em;

    public function __construct(LoggerInterface $logger, EntityManager $em)
    {
        $this->logger = $logger;
        $this->em = $em;
    }

    public function create(Song $song)
    {
        $this->em->persist($song);
        $this->em->flush();
    }

    public function getListAll($options = array())
    {
        return $this->em->getRepository('AppBundle:Song')->getAllQueryList($options);
    }
}