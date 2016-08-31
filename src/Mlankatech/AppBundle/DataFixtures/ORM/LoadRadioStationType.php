<?php

namespace Mlankatech\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mlankatech\AppBundle\Entity\RadioStationType;

class LoadRadioStationType extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load default gender objects
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $radioStationTypeCommercial = new RadioStationType('commercial');
        $manager->persist($radioStationTypeCommercial);

        $radioStationTypePublicBroadcaster = new RadioStationType('public broadcasting');
        $manager->persist($radioStationTypePublicBroadcaster);

        $manager->flush();

        $this->addReference('radio-type-commercial', $radioStationTypeCommercial);
        $this->addReference('radio-type-public-broadcaster', $radioStationTypePublicBroadcaster);
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }


}