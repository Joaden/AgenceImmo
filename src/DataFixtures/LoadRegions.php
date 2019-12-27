<?php
/**
 * User: denis
 * Date: 27/12/2019
 * Time: 15:06
 */
namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Regions;

class LoadRegions extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $region = new Regions();
        $region->setName('Alsace');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Aquitaine');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Auvergne');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Basse-Normandie');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Bourgogne');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Bretagne');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Centre');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Champagne');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Corse');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Franche-Comté');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Haute-Normandie');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Île-de-France');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Languedoc-Roussillon');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Limousin');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Lorraine');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Midi-Pyrénées');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Nord-pas-de-Calais');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Pays de la Loire');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Picardie');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Poitou-Charentes');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Provence-Alpes-Côte-d\'Azur');
        $manager->persist($region);
        $region = new Regions();
        $region->setName('Rhône-Alpes');
        $manager->persist($region);




        $manager->flush();

        $this->addReference('region', $region);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
}

