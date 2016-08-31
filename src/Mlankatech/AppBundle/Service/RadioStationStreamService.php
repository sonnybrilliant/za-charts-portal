<?php

namespace Mlankatech\AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Mlankatech\AppBundle\Entity\RadioStationStream;
use Psr\Log\LoggerInterface;

class RadioStationStreamService
{
    private $logger;
    private $em;

    public function __construct(LoggerInterface $logger, EntityManager $em)
    {
        $this->logger = $logger;
        $this->em = $em;
    }

    public function create(RadioStationStream $radioStationStream)
    {
        $this->em->persist($radioStationStream);
        $this->em->flush();
    }

    public function getListAll($options = array())
    {
        return $this->em->getRepository('AppBundle:RadioStationStream')->getAllQueryList($options);
    }
}