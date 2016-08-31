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
        $this->addReference('status-active', $active);

        $suspended = new Status();
        $suspended->setTitle('suspended');
        $suspended->setCode('suspended');
        $manager->persist($suspended);
        $this->addReference('status-suspended',$suspended);

        $expired = new Status();
        $expired->setTitle('expired');
        $expired->setCode('expired');
        $manager->persist($suspended);
        $this->addReference('status-expired',$expired);

        $streaming = new Status();
        $streaming->setTitle('streaming');
        $streaming->setCode('streaming');
        $manager->persist($streaming);
        $this->addReference('status-streaming',$streaming);

        $paused = new Status();
        $paused->setTitle('paused');
        $paused->setCode('paused');
        $manager->persist($paused);
        $this->addReference('status-paused',$paused);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }

}