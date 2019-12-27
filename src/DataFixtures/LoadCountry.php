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
use App\Entity\Country;

class LoadCountry extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $countryFr = new Country();
        $countryFr->setName('France');
        $countryFr->setCode('FR');
        $countryFr->setId(12);
        $manager->persist($countryFr);

        $manager->flush();

        $this->addReference('country', $countryFr);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
}

