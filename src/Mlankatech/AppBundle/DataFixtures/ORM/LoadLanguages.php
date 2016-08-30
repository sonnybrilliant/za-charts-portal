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

        $english = new Language("english");
        $manager->persist($english);

        $ndebele = new Language("Ndebele");
        $manager->persist($ndebele);

        $northSotho = new Language("north sotho");
        $manager->persist($northSotho);

        $southSotho = new Language("south sotho");
        $manager->persist($southSotho);

        $swati = new Language("swati");
        $manager->persist($swati);

        $tsonga = new Language("tsonga");
        $manager->persist($tsonga);

        $tswana = new Language("tswana");
        $manager->persist($tswana);

        $venda = new Language("venda");
        $manager->persist($venda);

        $xhosa = new Language("xhosa");
        $manager->persist($xhosa);

        $zulu = new Language("zulu");
        $manager->persist($zulu);

        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }

}