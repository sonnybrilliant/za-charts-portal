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
use Mlankatech\AppBundle\Entity\RadioStation;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadRadioStation5FM extends AbstractFixture implements OrderedFixtureInterface,ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $radioStationService = $this->container->get('app.radio.station.service');

        $fiveFM = new RadioStation();
        $fiveFM->setName("5FM");
        $fiveFM->setBio("The SABC's trendy youth-oriented station, 5FM's emphasis is on the latest music, movies and South African youth trends. Broadcasting in English to South Africa's metropolitan areas, its music styles are international, and include a strong component of South African artists of world standard.");
        $fiveFM->setFrequency("98.0 FM");
        $fiveFM->setWebsite("www.5fm.co.za");
        $fiveFM->setStream("http://radio-int-edge-eu01-sc.antfarm.co.za:9034/5fm");
        $fiveFM->setContactNumber('089 11 00 505');
        $fiveFM->setContactEmail("");
        $fiveFM->setStatus($this->getReference('status-active'));
        $fiveFM->setRadioStationType($this->getReference('radio-type-commercial'));
        $fiveFM->setLogo('5fm.jpg');
        //languages
        $fiveFM->addLanguage($this->getReference('lang-english'));

        //Genres (Popular)
        $fiveFM->addGenre($this->getReference('genre-hip-hop'));
        $fiveFM->addGenre($this->getReference('genre-pop'));
        $fiveFM->addGenre($this->getReference('genre-rock'));
        $fiveFM->addGenre($this->getReference('genre-afro-pop'));

        //Broadcast Areas
        $fiveFM->addProvince($this->getReference('province-gauteng'));
        $fiveFM->addProvince($this->getReference('province-limpopo'));
        $fiveFM->addProvince($this->getReference('province-free-state'));
        $fiveFM->addProvince($this->getReference('province-natal'));
        $fiveFM->addProvince($this->getReference('province-eastern-cape'));
        $fiveFM->addProvince($this->getReference('province-mpumalanga'));
        $fiveFM->addProvince($this->getReference('province-western-cape'));

        $fiveFM->setStreamId('8660');
        $fiveFM->setCreatedBy($this->getReference('admin'));
        $manager->persist($fiveFM);
        $manager->flush();

        $this->setReference('radio_station-metro',$fiveFM);
    }

    public function getOrder()
    {
        return 3;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}