<?php

namespace Mlankatech\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mlankatech\AppBundle\Entity\Gender;

class LoadGenders extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load default gender objects
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $male = new Gender();
        $male->setTitle('male');
        $manager->persist($male);

        $female = new Gender();
        $female->setTitle('female');
        $manager->persist($female);

        $manager->flush();

        $this->addReference('gender-male', $male);
        $this->addReference('gender-female', $female);
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }


}