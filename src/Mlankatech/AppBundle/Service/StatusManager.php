<?php

namespace Mlankatech\AppBundle\Service;


use Doctrine\ORM\EntityManager;
use Mlankatech\AppBundle\AppBundle;
use Psr\Log\LoggerInterface;


class StatusManager
{
    private $logger;
    private $em;

    public function __construct(LoggerInterface $logger, EntityManager $em)
    {
        $this->logger = $logger;
        $this->em = $em;
    }

    /**
     * Get Active Status
     * @return AppBundle:Status
     */
    public function active()
    {
        $this->logger->info(__CLASS__.":".__METHOD__);
        return $this->em->getRepository('AppBundle:Status')->getByCode('active');
    }
}