<?php

namespace Mlankatech\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mlankatech\AppBundle\Entity\Language;


class LoadLanguages extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $afrikaans = new Language("afrikaans");
        $manager->persist($afrikaans);
        $this->setReference('lang-afrikaan',$afrikaans);

        $english = new Language("english");
        $manager->persist($english);
        $this->setReference('lang-english',$english);

        $ndebele = new Language("Ndebele");
        $manager->persist($ndebele);
        $this->setReference('lang-ndebele',$ndebele);

        $northSotho = new Language("north sotho");
        $manager->persist($northSotho);
        $this->setReference('lang-north-sotho',$northSotho);

        $southSotho = new Language("south sotho");
        $manager->persist($southSotho);
        $this->setReference('lang-south-sotho',$southSotho);

        $swati = new Language("swati");
        $manager->persist($swati);
        $this->setReference('lang-swati',$swati);

        $tsonga = new Language("tsonga");
        $manager->persist($tsonga);
        $this->setReference('lang-tsonga',$tsonga);

        $tswana = new Language("tswana");
        $manager->persist($tswana);
        $this->setReference('lang-tswana',$tswana);

        $venda = new Language("venda");
        $manager->persist($venda);
        $this->setReference('lang-venda',$venda);

        $xhosa = new Language("xhosa");
        $manager->persist($xhosa);
        $this->setReference('lang-xhosa',$xhosa);

        $zulu = new Language("zulu");
        $manager->persist($zulu);
        $this->setReference('lang-zulu',$zulu);

        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }

}