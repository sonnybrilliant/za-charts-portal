<?php
/**
 * Created by PhpStorm.
 * User: mfana
 * Date: 2016/08/28
 * Time: 11:41 AM
 */

namespace Mlankatech\AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mlankatech\AppBundle\Entity\Status;

class LoadStatus extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
       $active = new Status();
       $active->setTitle('active');
       $active->setCode('active');
       $manager->persist($active);

       $suspended = new Status();
       $suspended->setTitle('suspended');
       $suspended->setCode('suspended');
       $manager->persist($suspended);

       $expired = new Status();
       $expired->setTitle('expired');
       $expired->setCode('expired');
       $manager->persist($suspended);



       $manager->flush();

       $this->addReference('active',$active);
    }

    public function getOrder()
    {
        return 1;
    }

}