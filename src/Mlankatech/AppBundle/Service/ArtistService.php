<?php

namespace Mlankatech\AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Mlankatech\AppBundle\Entity\Artist;
use Psr\Log\LoggerInterface;

class ArtistService
{
    private $logger;
    private $em;

    public function __construct(LoggerInterface $logger, EntityManager $em)
    {
        $this->logger = $logger;
        $this->em = $em;
    }

    /**
     * Add artist
     * @param Artist $artist
     */
    public function create(Artist $artist)
    {
        $this->em->persist($artist);
        $this->em->flush();
    }

    public function getListAll($options = array())
    {
        return $this->em->getRepository('AppBundle:Artist')->getAllQueryList($options);
    }
}