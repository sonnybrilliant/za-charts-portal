<?php

namespace Mlankatech\AppBundle\Security;


use Doctrine\ORM\EntityManager;
use Mlankatech\AppBundle\Entity\User;
use Mlankatech\AppBundle\Service\StatusManager;
use Psr\Log\LoggerInterface;

class UserService
{
    private $logger;
    private $em;
    private $statusService;

    public function __construct(LoggerInterface $logger,EntityManager $em,StatusManager $statusService)
    {
        $this->logger = $logger;
        $this->em = $em;
        $this->statusService = $statusService;
    }

    /**
     * Get User by Id
     * @param $id
     * @return \Mlankatech\AppBundle\Entity\User|null|object
     */
    public function getById($id)
    {
        $this->logger->info(__CLASS__.":".__FUNCTION__);
        return $this->em->getRepository('AppBundle:User')->find($id);
    }

    /**
     * Create Admin user
     *
     * @param User $user
     * @return User
     */
    public function createAdmin(User $user)
    {
        $this->logger->info(__CLASS__.":".__FUNCTION__);
        $user->setRole('ROLE_ADMIN');
        $user = $this->createUser($user);

        /** TODO - fire event and send email */
        return $user;
    }

    /**
     * Create user account
     *
     * @param User $user
     * @return User
     */
    private function createUser(User $user)
    {
        $this->logger->info(__CLASS__.":".__FUNCTION__);
        $user->setStatus($this->statusService->active());
        $this->em->persist($user);
        $this->em->flush();
        return $user;
    }
}