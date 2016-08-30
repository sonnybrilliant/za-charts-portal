<?php
/**
 * Created by PhpStorm.
 * User: mfana
 * Date: 2016/08/28
 * Time: 12:50 PM
 */

namespace Mlankatech\AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mlankatech\AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Mlankatech\AppBundle\Security\UserService;

class LoadAdmin extends AbstractFixture implements OrderedFixtureInterface,ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $userService = $this->container->get('app.user.service');

        $admin = new User();
        $admin->setFirstName('Mfana');
        $admin->setSurname('Conco');
        $admin->setMsisdn('0713264125');
        $admin->setGender($this->getReference('gender-male'));
        $admin->setEmail('ronald.conco@mlankatech.co.za');
        $admin->setPlainPassword('pr0f1l3Mlanka');

        $userService->createAdmin($admin);
        $this->setReference('admin',$admin);
    }

    public function getOrder()
    {
        return 2;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}