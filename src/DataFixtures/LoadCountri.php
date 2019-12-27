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
use App\Entity\Countri;

class LoadCountri extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $countriFr = new Countri();
        $countriFr->setName('France');
        $countriFr->setCode('FR');
        $countriFr->setId(12);
        $manager->persist($countriFr);

        $manager->flush();

        $this->addReference('countri', $countriFr);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
}

