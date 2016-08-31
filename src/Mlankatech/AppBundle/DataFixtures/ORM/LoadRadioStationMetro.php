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

class LoadRadioStationMetro extends AbstractFixture implements OrderedFixtureInterface,ContainerAwareInterface
{
    private $container;

    public function load(ObjectManager $manager)
    {
        $radioStationService = $this->container->get('app.radio.station.service');

        $metro = new RadioStation();
        $metro->setName("Metro FM");
        $metro->setBio("Broadcast in English, Metro FM is the largest national commercial station in South Africa, targeting 25- to 34-year-old black urban adults - who its owner the SABC describes as 'trendy, innovative, progressive and aspirational'. While the station does have some information and educational aspects, the focus is firmly on contemporary international music - hip-hop, R&B, kwaito and more.");
        $metro->setFrequency("96.4 FM");
        $metro->setWebsite("www.metrofm.co.za");
        $metro->setStream("rtmp://cdn-radio-za-metro-sabc-metrofm.antfarm.co.za:80/metro/metro_s.stream_64k");
        $metro->setContactNumber('089 110 3377');
        $metro->setContactEmail("info@metrofm.co.za");
        $metro->setStatus($this->getReference('status-active'));
        $metro->setRadioStationType($this->getReference('radio-type-commercial'));
        $metro->setLogo('metroFM.jpg');
        //languages
        $metro->addLanguage($this->getReference('lang-english'));

        //Genres (Popular)
        $metro->addGenre($this->getReference('genre-hip-hop'));
        $metro->addGenre($this->getReference('genre-rnb'));
        $metro->addGenre($this->getReference('genre-rap'));
        $metro->addGenre($this->getReference('genre-kwaito'));
        $metro->addGenre($this->getReference('genre-afro-pop'));

        //Broadcast Areas
        $metro->addProvince($this->getReference('province-gauteng'));
        $metro->addProvince($this->getReference('province-limpopo'));
        $metro->addProvince($this->getReference('province-free-state'));
        $metro->addProvince($this->getReference('province-natal'));
        $metro->addProvince($this->getReference('province-eastern-cape'));
        $metro->addProvince($this->getReference('province-western-cape'));

        $metro->setStreamId('8661');
        $metro->setCreatedBy($this->getReference('admin'));

        $manager->persist($metro);
        $manager->flush();

        $this->setReference('radio_station-metro',$metro);
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