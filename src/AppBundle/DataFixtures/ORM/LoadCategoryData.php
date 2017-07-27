<?php
/**
 * Created by PhpStorm.
 * User: GLOBAL SERVICE PLUS
 * Date: 19/07/2017
 * Time: 21:44
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $type1="catalogue materiel";
        $type2="dell partner direct";
        $cataloguemateriel=$this->getCatalogueMateriel();
        $getdellpartnerdirect=$this->getDELLPartnerDirect();
        for ($i=0; $i<count($cataloguemateriel); $i++){
            $category= new Category();
            $category->setName($cataloguemateriel[$i]);
            $category->setType($type1);
            $manager->persist($category);
            $this->addReference('categorymateriel__' . $i, $category);
        }

        for ($i=0; $i<count($getdellpartnerdirect); $i++){
            $category= new Category();
            $category->setName($getdellpartnerdirect[$i]);
            $category->setType($type2);
            $manager->persist($category);
            $this->addReference('dellpartnerdirect_' . $i, $category);
        }
        $manager->flush();
    }

    private function getCatalogueMateriel()
    {
        return array(
            'Alimentations',
            'Barrettes mémoire',
            'Câbles',
            'Cartes-Graphiques',
            'Cartes-mères',
            'Claviers',
            'Contrôleurs RAID',
            'Disques durs',
            'Ecrans',
            'Lecteur CD/DVD-RW-ROM',
            'Lecteurs sauvegardes',
            'Options réseaux',
            'PC complets',
            'Processeurs',
            'Serveurs ',
            'Souris',
            'Stations de travail',
            'Ventilateurs - Radiateurs'
        );
    }

    private function getDELLPartnerDirect()
    {
        return array(
            'PC Bureau DEL',
            'PC Portable D',
            'Disques DELL',
            'Serveurs Tour',
            'Serveurs Rack',
            'Stations de t',
            'Imprimantes',
            'Toner DELL'
        );
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}