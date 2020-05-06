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
use App\Entity\Departments;

class LoadDepartments extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $department = new Departments();
        $department->setName('Ain');
        $department->setNameNum('01');
        $department->setRegion(22);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Aisne');
        $department->setNameNum('02');
        $department->setRegion(19);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Allier');
        $department->setNameNum('03');
        $department->setRegion(3);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Alpes-de-Haute-Provence');
        $department->setNameNum('05');
        $department->setRegion(21);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Hautes-Alpes');
        $department->setNameNum('01');
        $department->setRegion(21);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Alpes-Maritimes');
        $department->setNameNum('06');
        $department->setRegion(21);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Ardèche');
        $department->setNameNum('07');
        $department->setRegion(22);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Ardennes');
        $department->setNameNum('08');
        $department->setRegion(8);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Ariège');
        $department->setNameNum('09');
        $department->setRegion(16);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Aube');
        $department->setNameNum('10');
        $department->setRegion(8);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Aude');
        $department->setNameNum('11');
        $department->setRegion(13);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Aveyron');
        $department->setNameNum('12');
        $department->setRegion(16);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Bouches-du-Rhône');
        $department->setNameNum('13');
        $department->setRegion(21);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Calvados');
        $department->setNameNum('14');
        $department->setRegion(4);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Cantal');
        $department->setNameNum('15');
        $department->setRegion(3);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Charente');
        $department->setNameNum('16');
        $department->setRegion(20);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Charente-Maritime');
        $department->setNameNum('17');
        $department->setRegion(20);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Cher');
        $department->setNameNum('18');
        $department->setRegion(7);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Corrèze');
        $department->setNameNum('19');
        $department->setRegion(14);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Côte-d\'Or');
        $department->setNameNum('21');
        $department->setRegion(5);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Côtes-d\'Armor');
        $department->setNameNum('22');
        $department->setRegion(6);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Creuse');
        $department->setNameNum('23');
        $department->setRegion(14);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Dordogne');
        $department->setNameNum('24');
        $department->setRegion(2);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Doubs');
        $department->setNameNum('25');
        $department->setRegion(10);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Drôme');
        $department->setNameNum('26');
        $department->setRegion(22);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Eure');
        $department->setNameNum('26');
        $department->setRegion(22);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Eure-et-Loir');
        $department->setNameNum('28');
        $department->setRegion(7);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Finistère');
        $department->setNameNum('29');
        $department->setRegion(6);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Corse-du-Sud');
        $department->setNameNum('2A');
        $department->setRegion(9);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Haute-Corsee');
        $department->setNameNum('2B');
        $department->setRegion(9);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Gard');
        $department->setNameNum('31');
        $department->setRegion(13);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Haute-Garonne');
        $department->setNameNum('2B');
        $department->setRegion(9);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Gers');
        $department->setNameNum('32');
        $department->setRegion(16);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Gironde');
        $department->setNameNum('33');
        $department->setRegion(2);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Hérault');
        $department->setNameNum('34');
        $department->setRegion(13);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Ille-et-Vilaine');
        $department->setNameNum('35');
        $department->setRegion(6);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Indre');
        $department->setNameNum('36');
        $department->setRegion(7);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Indre-et-Loire');
        $department->setNameNum('37');
        $department->setRegion(7);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Isère');
        $department->setNameNum('38');
        $department->setRegion(22);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Jura');
        $department->setNameNum('39');
        $department->setRegion(10);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Landes');
        $department->setNameNum('40');
        $department->setRegion(2);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Loir-et-Cher');
        $department->setNameNum('41');
        $department->setRegion(7);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Loire');
        $department->setNameNum('42');
        $department->setRegion(10);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Haute-Loire');
        $department->setNameNum('43');
        $department->setRegion(3);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Loire-Atlantique');
        $department->setNameNum('44');
        $department->setRegion(18);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Loiret');
        $department->setNameNum('45');
        $department->setRegion(7);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Lot');
        $department->setNameNum('46');
        $department->setRegion(16);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Lot Et Garonne');
        $department->setNameNum('47');
        $department->setRegion(2);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Lozère');
        $department->setNameNum('48');
        $department->setRegion(48);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Maine-et-Loire');
        $department->setNameNum('49');
        $department->setRegion(18);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Manche');
        $department->setNameNum('50');
        $department->setRegion(4);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Marne');
        $department->setNameNum('51');
        $department->setRegion(8);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Haute-Marne');
        $department->setNameNum('52');
        $department->setRegion(8);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Mayenne');
        $department->setNameNum('53');
        $department->setRegion(18);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Meurthe-et-Moselle');
        $department->setNameNum('54');
        $department->setRegion(15);
        $department->setRegion(15);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Meuse');
        $department->setNameNum('55');
        $department->setRegion(15);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Morbihan');
        $department->setNameNum('56');
        $department->setRegion(6);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Moselle');
        $department->setNameNum('57');
        $department->setRegion(15);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Nièvre');
        $department->setNameNum('58');
        $department->setRegion(5);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Nord');
        $department->setNameNum('59');
        $department->setRegion(17);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Oise');
        $department->setNameNum('60');
        $department->setRegion(19);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Orne');
        $department->setNameNum('61');
        $department->setRegion(4);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Pas-de-Calais');
        $department->setNameNum('62');
        $department->setRegion(17);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Puy-de-Dôme');
        $department->setNameNum('63');
        $department->setRegion(3);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Pyrénées-Atlantiques');
        $department->setNameNum('64');
        $department->setRegion(2);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Hautes Pyrenees');
        $department->setNameNum('65');
        $department->setRegion(16);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Pyrénées-Orientales');
        $department->setNameNum('66');
        $department->setRegion(13);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Bas rhin');
        $department->setNameNum('67');
        $department->setRegion(1);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Haut-Rhin');
        $department->setNameNum('68');
        $department->setRegion(1);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Rhône');
        $department->setNameNum('69');
        $department->setRegion(22);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Haute-Saône');
        $department->setNameNum('70');
        $department->setRegion(10);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Saône-et-Loire');
        $department->setNameNum('71');
        $department->setRegion(5);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Sarthe');
        $department->setNameNum('72');
        $department->setRegion(18);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Savoie');
        $department->setNameNum('73');
        $department->setRegion(22);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Haute-Savoie');
        $department->setNameNum('74');
        $department->setRegion(22);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Paris');
        $department->setNameNum('75');
        $department->setRegion(12);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Seine-Maritime');
        $department->setNameNum('76');
        $department->setRegion(11);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Seine-et-Marne');
        $department->setNameNum('77');
        $department->setRegion(12);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Yvelines');
        $department->setNameNum('78');
        $department->setRegion(12);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Deux-Sèvres');
        $department->setNameNum('79');
        $department->setRegion(20);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Somme');
        $department->setNameNum('80');
        $department->setRegion(19);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Tarn');
        $department->setNameNum('81');
        $department->setRegion(16);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Tarn-et-Garonne');
        $department->setNameNum('82');
        $department->setRegion(16);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Var');
        $department->setNameNum('83');
        $department->setRegion(21);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Vaucluse');
        $department->setNameNum('84');
        $department->setRegion(21);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Vendée');
        $department->setNameNum('85');
        $department->setRegion(18);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Vienne');
        $department->setNameNum('86');
        $department->setRegion(20);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Haute-Vienne');
        $department->setNameNum('87');
        $department->setRegion(14);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Vosges');
        $department->setNameNum('88');
        $department->setRegion(15);
        $manager->persist($department);
        $department = new Departments();
        $department->setName('Yonne');
        $department->setNameNum('89');
        $department->setRegion(5);
        $manager->persist($department);

        $department = new Departments();
        $department->setName('Territoire de Belfort');
        $department->setNameNum('90');
        $department->setRegion(10);
        $manager->persist($department);

        $department = new Departments();
        $department->setName('Essonne');
        $department->setNameNum('91');
        $department->setRegion(12);
        $manager->persist($department);

        $department = new Departments();
        $department->setName('Hauts-de-Seine');
        $department->setNameNum('92');
        $department->setRegion(12);
        $manager->persist($department);

        $department = new Departments();
        $department->setName('Seine-Saint-Denis');
        $department->setNameNum('93');
        $department->setRegion(12);
        $manager->persist($department);

        $department = new Departments();
        $department->setName('Val-de-Marne');
        $department->setNameNum('94');
        $department->setRegion(12);
        $manager->persist($department);

        $department = new Departments();
        $department->setName('Val-d\'Oise');
        $department->setNameNum('95');
        $department->setRegion(12);
        $manager->persist($department);






        $manager->flush();

        $this->addReference('department', $department);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
}



