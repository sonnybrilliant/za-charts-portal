<?php

namespace Mlankatech\AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Mlankatech\AppBundle\Entity\RadioStation;
use Psr\Log\LoggerInterface;

class RadioStationService
{
    private $logger;
    private $em;

    public function __construct(LoggerInterface $logger, EntityManager $em)
    {
        $this->logger = $logger;
        $this->em = $em;
    }

    public function create(RadioStation $radioStation)
    {
        $this->em->persist($radioStation);
        $this->em->flush();
    }

    public function getListAll($options = array())
    {
        return $this->em->getRepository('AppBundle:RadioStation')->getAllQueryList($options);
    }
}