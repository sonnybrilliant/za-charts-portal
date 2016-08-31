<?php

namespace Mlankatech\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mlankatech\AppBundle\Entity\Province;

class LoadProvinces extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load default gender objects
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $easternCape = new Province('The Eastern Cape');
        $manager->persist($easternCape);

        $freeState = new Province('The Free State');
        $manager->persist($freeState);

        $gauteng = new Province('Gauteng');
        $manager->persist($gauteng);

        $natal = new Province('KwaZulu-Natal');
        $manager->persist($natal);

        $limpopo = new Province('Limpopo');
        $manager->persist($limpopo);

        $mpumalanga = new Province('Mpumalanga');
        $manager->persist($mpumalanga);

        $northernCape = new Province('The Northern Cape');
        $manager->persist($northernCape);

        $northWest = new Province('North West');
        $manager->persist($northWest);

        $westernCape = new Province('The Western Cape');
        $manager->persist($westernCape);

        $manager->flush();

        $this->addReference('province-eastern-cape', $easternCape);
        $this->addReference('province-free-state', $freeState);
        $this->addReference('province-gauteng', $gauteng);
        $this->addReference('province-natal', $natal);
        $this->addReference('province-limpopo', $limpopo);
        $this->addReference('province-mpumalanga', $mpumalanga);
        $this->addReference('province-northern-cape', $northernCape);
        $this->addReference('province-northern-west', $northWest);
        $this->addReference('province-western-cape', $westernCape);

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }


}