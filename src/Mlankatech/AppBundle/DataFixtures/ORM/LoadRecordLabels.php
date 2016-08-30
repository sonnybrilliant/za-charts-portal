<?php

namespace Mlankatech\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mlankatech\AppBundle\Entity\RecordLabel;

class LoadRecordLabels extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load default gender objects
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $rlUniversal = new RecordLabel();
        $rlUniversal->setName('Universal Music SA');
        $rlUniversal->setCreatedBy($this->getReference('admin'));
        $manager->persist($rlUniversal);

        $rlSony = new RecordLabel();
        $rlSony->setName('Sony Music South Africa');
        $rlSony->setCreatedBy($this->getReference('admin'));
        $manager->persist($rlSony);

        $rlEpic = new RecordLabel();
        $rlEpic->setName('Epic');
        $rlEpic->setCreatedBy($this->getReference('admin'));
        $manager->persist($rlEpic);

        $rlRCA = new RecordLabel();
        $rlRCA->setName('RCA');
        $rlRCA->setCreatedBy($this->getReference('admin'));
        $manager->persist($rlRCA);

        $manager->flush();

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }


}